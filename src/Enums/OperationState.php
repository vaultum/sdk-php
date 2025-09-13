<?php

declare(strict_types=1);

namespace Vaultum\SDK\Enums;

enum OperationState: string
{
    case QUEUED = 'queued';
    case SENT = 'sent';
    case SUCCESS = 'success';
    case FAILED = 'failed';
}
