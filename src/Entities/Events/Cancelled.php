<?php

namespace IfoodStrategy\Entities\Events;

use IfoodStrategy\Contracts\EventContract;
use IfoodStrategy\Entities\Event;

/**
 * Class Cancelled
 * @package IfoodStrategy\Entities\Events
 */
class Cancelled implements EventContract
{

    /**
     * @param Event $event
     * @return string
     */
    public function handle(Event $event): string
    {
        $this->ack($event->getPayloadToAck());

        switch ($event->getCode()) {
            case 'CAN':
                /** @var $this $messageHandle */
                $messageHandle = $this->handleCancelledWithSuccess();
                break;
            case 'CCR':
                $messageHandle = $this->handleConsumerCancellationRequest();
                break;
            case 'CARF' || 'CCD':
                $messageHandle = $this->handleCancellationRequestDenied();
                break;
            case 'CCA':
                $messageHandle = $this->handleConsumerCancellationAccepted();
                break;
            default:
                throw new \InvalidArgumentException("Code {$event->getCode()} unknown");
        }

        return $messageHandle;
    }

    /**
     * @return string
     */
    private function handleCancelledWithSuccess(): string
    {
        return "handle success";
    }

    /**
     * @return string
     */
    private function handleConsumerCancellationRequest(): string
    {
        return "handle consumer cancellation request";
    }

    /**
     * @return string
     */
    public function handleCancellationRequestDenied(): string
    {
        return "handle cancellation request denied";
    }

    /**
     * @return string
     */
    public function handleConsumerCancellationAccepted(): string
    {
        return "handle consumer cancellation accepted";
    }

    public function ack(array $event): void
    {
        //
    }
}
