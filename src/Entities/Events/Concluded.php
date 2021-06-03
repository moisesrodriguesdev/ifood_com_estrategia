<?php

namespace IfoodStrategy\Entities\Events;

use IfoodStrategy\Contracts\EventContract;
use IfoodStrategy\Entities\Event;

class Concluded implements EventContract
{

    public function handle(Event $event): string
    {
        return "handle concluded";
    }

    public function ack(array $event): void
    {
        // TODO: Implement ack() method.
    }
}
