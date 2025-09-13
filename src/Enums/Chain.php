<?php

declare(strict_types=1);

namespace Vaultum\SDK\Enums;

enum Chain: string
{
    case ETHEREUM = 'ethereum';
    case POLYGON = 'polygon';
    case ARBITRUM = 'arbitrum';
    case OPTIMISM = 'optimism';
    case BASE = 'base';
}
