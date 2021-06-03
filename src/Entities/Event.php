<?php

namespace IfoodStrategy\Entities;

/**
 * Class Event
 * @package IfoodStrategy\Entities
 */
class Event
{
    /** @var string $id */
    private string $id;

    /** @var string $code */
    private string $code;

    /** @var string $fullCode */
    private string $fullCode;

    /** @var string $orderId */
    private string $orderId;

    /** @var string $createdAt */
    private string $createdAt;

    /** @var array|null $metadata */
    private ?array $metadata = [];

    /**
     * Event constructor.
     * @param string $id
     * @param string $code
     * @param string $fullCode
     * @param string $orderId
     * @param string $createdAt
     */
    public function __construct(string $id, string $code, string $fullCode, string $orderId, string $createdAt)
    {
        $this->id = $id;
        $this->code = $code;
        $this->fullCode = $fullCode;
        $this->orderId = $orderId;
        $this->createdAt = $createdAt;
    }

    /** @return string */
    public function getId(): string
    {
        return $this->id;
    }

    /** @return string */
    public function getCode(): string
    {
        return $this->code;
    }

    /** @return string */
    public function getFullCode(): string
    {
        return $this->fullCode;
    }

    /** @return string */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /** @return string */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /** @return array|null */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /** @param array|null $metadata */
    public function setMetadata(?array $metadata): void
    {
        $this->metadata = $metadata;
    }
}
