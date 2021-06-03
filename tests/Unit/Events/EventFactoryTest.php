<?php

namespace IfoodStrategy\Test;

use IfoodStrategy\Entities\Events\Cancelled;
use IfoodStrategy\Entities\Events\Confirmed;
use IfoodStrategy\Entities\Events\Dispatched;
use IfoodStrategy\Entities\Events\EventFactory;
use IfoodStrategy\Entities\Events\Placed;
use IfoodStrategy\Entities\Events\ReadyToPickup;
use PHPUnit\Framework\TestCase;

class EventFactoryTest extends TestCase
{

    public function testShouldReturnInstanceToClassPlaced(): void
    {
        // arrange
        $event = [
              'id' => '58c3f8fc-fb2a-49a3-b99c-09ecf2cd590d',
              'code' => 'PLC',
              'fullCode' => 'PLACED',
              'orderId' => '8ee1ba27-b3be-4164-8f5c-285236a20ecc',
              'createdAt' => '2021-02-17T15:07:20.04'
        ];

        // act
        $eventFactory = EventFactory::getEvent($event['code']);

        // assert
        $this->assertInstanceOf(Placed::class, $eventFactory);
    }

    public function testShouldReturnInstanceToClassCancelled(): void
    {
        // arrange
        $event = [
              'id' => '4b3ee8fb-4cff-4987-9082-429fb418a6dc',
              'code' => 'CAN',
              'fullCode' => 'CANCELLED',
              'orderId' => '93ba4bf4-f4ae-4de8-8017-35d7c7de9bf1',
              'createdAt' => '2021-02-17T19:39:34.553Z',
        ];

        // act
        $eventFactory = EventFactory::getEvent($event['code']);

        // assert
        $this->assertInstanceOf(Cancelled::class, $eventFactory);
    }

    public function testShouldReturnInstanceToClassConfirmed(): void
    {
        // arrange
        $event = [
              'id' => 'b03392c5-61dd-47c4-a503-bce3109c96c8',
              'code' => 'CFM',
              'fullCode' => 'CONFIRMED',
              'orderId' => '93ba4bf4-f4ae-4de8-8017-35d7c7de9bf1',
              'createdAt' => '2021-02-17T19:36:55.295Z'
        ];

        // act
        $eventFactory = EventFactory::getEvent($event['code']);

        // assert
        $this->assertInstanceOf(Confirmed::class, $eventFactory);
    }

    public function testShouldReturnInstanceToClassDispatched(): void
    {
        // arrange
        $event = [
              'id' => '55883fa5-53d6-48cc-a225-5b22b7f59b52',
              'code' => 'DSP',
              'fullCode' => 'DISPATCHED',
              'orderId' => '5116da27-6afc-4478-9120-423396a90fd5',
              'createdAt' => '2021-02-17T19:51:45.704'
        ];

        // act
        $eventFactory = EventFactory::getEvent($event['code']);

        // assert
        $this->assertInstanceOf(Dispatched::class, $eventFactory);
    }

    public function testShouldReturnInstanceToClassReadyToPickup(): void
    {
        // arrange
        $event = [
              'id' => '0fc61454-0481-4f9e-957c-a70367752f73',
              'code' => 'RTP',
              'fullCode' => 'READY_TO_PICKUP',
              'orderId' => '5116da27-6afc-4478-9120-423396a90fd5',
              'createdAt' => '2021-02-17T19:51:09.875'
        ];

        // act
        $eventFactory = EventFactory::getEvent($event['code']);

        // assert
        $this->assertInstanceOf(ReadyToPickup::class, $eventFactory);
    }

    public function testShouldReturnInvalidArgumentException(): void
    {
        $event = [
            'code' => 'TST'
        ];

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Event {$event['code']} invalid");

        EventFactory::getEvent($event['code']);
    }
}
