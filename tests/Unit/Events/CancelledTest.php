<?php

namespace IfoodStrategy\Test;

use IfoodStrategy\Entities\Event;
use IfoodStrategy\Entities\Events\EventFactory;
use PHPUnit\Framework\TestCase;

class CancelledTest extends TestCase
{
    public function testShouldReturnHandleSuccess(): void
    {
        // arrange
        $event = $this->data()['CAN'];

        // act
        $eventFactory = EventFactory::getEvent($event['code']);
        $eventInstance = new Event(
            $event['id'],
            $event['code'],
            $event['fullCode'],
            $event['orderId'],
            $event['createdAt']
        );
        $result = $eventFactory->handle($eventInstance);

        // assert
        $this->assertSame('handle success', $result);
    }

    public function testShouldReturnHandleConsumerCancellationRequest(): void
    {
        // arrange
        $event = $this->data()['CCR'];

        // act
        $eventFactory = EventFactory::getEvent($event['code']);
        $eventInstance = new Event(
            $event['id'],
            $event['code'],
            $event['fullCode'],
            $event['orderId'],
            $event['createdAt']
        );
        $result = $eventFactory->handle($eventInstance);

        // assert
        $this->assertSame('handle consumer cancellation request', $result);
    }

    public function testShouldReturnHandleConsumerCancellationDenied(): void
    {
        // arrange
        $event = $this->data()['CARF'];

        // act
        $eventFactory = EventFactory::getEvent($event['code']);
        $eventInstance = new Event(
            $event['id'],
            $event['code'],
            $event['fullCode'],
            $event['orderId'],
            $event['createdAt']
        );
        $result = $eventFactory->handle($eventInstance);

        // assert
        $this->assertSame('handle cancellation request denied', $result);
    }

    public function testShouldReturnHandleConsumerCancellationAccepted(): void
    {
        // arrange
        $event = $this->data()['CCA'];

        // act
        $eventFactory = EventFactory::getEvent($event['code']);
        $eventInstance = new Event(
            $event['id'],
            $event['code'],
            $event['fullCode'],
            $event['orderId'],
            $event['createdAt']
        );
        $result = $eventFactory->handle($eventInstance);

        // assert
        $this->assertSame('handle consumer cancellation accepted', $result);
    }

    public function data(): array
    {
        return [
            'CAN' => [
                'id' => '4b3ee8fb-4cff-4987-9082-429fb418a6dc',
                'code' => 'CAN',
                'fullCode' => 'CANCELLED',
                'orderId' => '93ba4bf4-f4ae-4de8-8017-35d7c7de9bf1',
                'createdAt' => '2021-02-17T19:39:34.553Z'
            ],
            'CCR' => [
                'id' => '4d063d88-32f6-4b89-b68b-48890b098c71',
                'orderId' => 'dd2796df-1c09-446b-a3b4-81f28849c459',
                'code' => 'CCR',
                'fullCode' => 'CONSUMER_CANCELLATION_REQUESTED',
                'createdAt' => '2021-02-17T19:51:45.704'
            ],
            'CARF' => [
                'id' => '0a643bea-d90f-490d-8b89-d55307365dd6',
                'orderId' => '0e445307-5fc8-4753-8660-1598690b4ae5',
                'code' => 'CARF',
                'fullCode' => 'CANCELLATION_REQUEST_FAILED',
                'createdAt' => '2021-02-24T16:43:00.295'
            ],
            'CCD' => [
                'id' => '4d063d88-32f6-4b89-b68b-48890b098c71',
                'orderId' => 'dd2796df-1c09-446b-a3b4-81f28849c459',
                'code' => 'CCD',
                'fullCode' => 'CONSUMER_CANCELLATION_DENIED',
                'createdAt' => '2021-02-17T19:51:45.704'
            ],
            'CCA' => [
                'id' => '4d063d88-32f6-4b89-b68b-48890b098c71',
                'orderId' => 'dd2796df-1c09-446b-a3b4-81f28849c459',
                'code' => 'CCA',
                'fullCode' => 'CONSUMER_CANCELLATION_ACCEPTED',
                'createdAt' => '2021-02-17T19:51:45.704'
            ]
        ];
    }
}
