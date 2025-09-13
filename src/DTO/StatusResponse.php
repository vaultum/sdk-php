<?php

declare(strict_types=1);

namespace Vaultum\SDK\DTO;

use Vaultum\SDK\Enums\OperationState;

class StatusResponse
{
    public function __construct(
        public readonly string $id,
        public readonly OperationState $state,
        public readonly ?string $txHash = null
    ) {}
    
    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            OperationState::from($data['state']),
            $data['txHash'] ?? null
        );
    }
}
