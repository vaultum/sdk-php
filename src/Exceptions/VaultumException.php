<?php

declare(strict_types=1);

namespace Vaultum\SDK\Exceptions;

use Exception;

class VaultumException extends Exception
{
    public function __construct(
        string $message = "",
        public readonly ?int $statusCode = null,
        ?Exception $previous = null
    ) {
        parent::__construct($message, $statusCode ?? 0, $previous);
    }
}
