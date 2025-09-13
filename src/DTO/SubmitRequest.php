<?php

declare(strict_types=1);

namespace Vaultum\SDK\DTO;

use Vaultum\SDK\Enums\Chain;

class SubmitRequest
{
    public function __construct(
        public readonly Chain $chain,
        public readonly UserOperation $userOp,
        public readonly string $signature
    ) {}
    
    public function toArray(): array
    {
        return [
            'chain' => $this->chain->value,
            'userOp' => $this->userOp->toArray(),
            'signature' => $this->signature,
        ];
    }
}
