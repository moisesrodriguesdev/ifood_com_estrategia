<?php

namespace IfoodStrategy\Entities\Events;

use IfoodStrategy\Contracts\EventContract;
use IfoodStrategy\Entities\Event;

class Confirmed implements EventContract
{

    public function handle(Event $event): string
    {
        return "handle confirmed";
    }

    public function ack(array $event): void
    {
        // TODO: Implement ack() method.
    }
}
