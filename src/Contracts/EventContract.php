<?php

namespace IfoodStrategy\Contracts;

use IfoodStrategy\Entities\Event;

interface EventContract
{
    public function handle(Event $event): void;

    public function ack(array $event): void;
}