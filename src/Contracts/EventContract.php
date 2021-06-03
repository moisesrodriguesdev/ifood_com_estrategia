<?php

namespace IfoodStrategy\Contracts;

use IfoodStrategy\Entities\Event;

interface EventContract
{
    public function handle(Event $event): string;

    public function ack(array $event): void;
}