<?php

declare(strict_types=1);

namespace Vaultum\SDK\DTO;

class UserOperation
{
    public function __construct(
        public readonly string $sender,
        public readonly string $nonce,
        public readonly string $initCode,
        public readonly string $callData,
        public readonly string $callGasLimit,
        public readonly string $verificationGasLimit,
        public readonly string $preVerificationGas,
        public readonly string $maxFeePerGas,
        public readonly string $maxPriorityFeePerGas,
        public readonly string $paymasterAndData
    ) {}
    
    public function toArray(): array
    {
        return [
            'sender' => $this->sender,
            'nonce' => $this->nonce,
            'initCode' => $this->initCode,
            'callData' => $this->callData,
            'callGasLimit' => $this->callGasLimit,
            'verificationGasLimit' => $this->verificationGasLimit,
            'preVerificationGas' => $this->preVerificationGas,
            'maxFeePerGas' => $this->maxFeePerGas,
            'maxPriorityFeePerGas' => $this->maxPriorityFeePerGas,
            'paymasterAndData' => $this->paymasterAndData,
        ];
    }
}
