<?php

declare(strict_types=1);

namespace Vaultum\SDK\DTO;

use Vaultum\SDK\Enums\Chain;

class QuoteRequest
{
    public function __construct(
        public readonly Chain $fromChain,
        public readonly Chain $toChain,
        public readonly string $token,
        public readonly string $amount
    ) {}
    
    public function toArray(): array
    {
        return [
            'fromChain' => $this->fromChain->value,
            'toChain' => $this->toChain->value,
            'token' => $this->token,
            'amount' => $this->amount,
        ];
    }
}
