<?php

namespace IfoodStrategy\Entities\Events;

use IfoodStrategy\Contracts\EventContract;
use IfoodStrategy\Entities\Event;

class ReadyToPickup implements EventContract
{

    public function handle(Event $event): string
    {
        return "handle ready to pickup";
    }

    public function ack(array $event): void
    {
        // TODO: Implement ack() method.
    }
}
