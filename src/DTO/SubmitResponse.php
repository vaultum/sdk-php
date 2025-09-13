<?php

declare(strict_types=1);

namespace Vaultum\SDK\DTO;

class SubmitResponse
{
    public function __construct(
        public readonly string $id
    ) {}
    
    public static function fromArray(array $data): self
    {
        return new self($data['id']);
    }
}
