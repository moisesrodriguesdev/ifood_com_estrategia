<?php

namespace IfoodStrategy\Entities\Events;

use IfoodStrategy\Contracts\EventContract;

/**
 * Class EventFactory
 * @package IfoodStrategy\Entities\Events
 */
class EventFactory
{
    /**
     * @param string $event
     * @return EventContract
     */
    public static function getEvent(string $event): EventContract
    {
        switch ($event) {
            case 'PLC':
                return new Placed;
            case 'CFM':
                return new Confirmed;
            case 'RTP':
                return new ReadyToPickup;
            case 'DSP':
                return new Dispatched;
            case 'CON':
                return new Concluded;
            case 'CAN':
                return new Cancelled;
            default:
                throw new \InvalidArgumentException("Event {$event} invalid");
        }
    }
}
