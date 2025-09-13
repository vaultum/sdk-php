<?php

declare(strict_types=1);

namespace Vaultum\SDK\Exceptions;

class ValidationException extends VaultumException
{
    public function __construct(
        string $message = "Validation failed",
        public readonly array $errors = []
    ) {
        parent::__construct($message, 422);
    }
    
    public function getErrors(): array
    {
        return $this->errors;
    }
}
