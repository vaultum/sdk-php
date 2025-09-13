<?php

declare(strict_types=1);

namespace Vaultum\SDK\DTO;

class QuoteResponse
{
    public function __construct(
        public readonly string $estimatedFee,
        public readonly Route $route
    ) {}
    
    public static function fromArray(array $data): self
    {
        return new self(
            $data['estimatedFee'],
            Route::fromArray($data['route'])
        );
    }
}

class Route
{
    public function __construct(
        public readonly array $path,
        public readonly array $bridges,
        public readonly int $estimatedTime
    ) {}
    
    public static function fromArray(array $data): self
    {
        return new self(
            $data['path'],
            $data['bridges'],
            $data['estimatedTime']
        );
    }
}
