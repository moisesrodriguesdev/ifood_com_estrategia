<?php

namespace IfoodStrategy\Test;

use IfoodStrategy\Entities\Event;
use IfoodStrategy\Entities\Events\EventFactory;
use PHPUnit\Framework\TestCase;

class PlacedTest extends TestCase
{
    public function testShouldReturnHandlePlaced(): void
    {
        // arrange
        $event = $this->data();

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
        $this->assertSame('handle placed', $result);
    }

    public function testNotShouldReturnHandlePlaced(): void
    {
        // arrange
        $event = $this->data();

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
        $this->assertNotEquals('test', $result);
    }

    public function data(): array
    {
        return [
            'id' => '58c3f8fc-fb2a-49a3-b99c-09ecf2cd590d',
            'code' => 'PLC',
            'fullCode' => 'PLACED',
            'orderId' => '8ee1ba27-b3be-4164-8f5c-285236a20ecc',
            'createdAt' => '2021-02-17T15:07:20.04'
        ];
    }
}
