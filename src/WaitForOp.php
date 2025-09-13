<?php

namespace Vaultum\SDK;

use Vaultum\SDK\Client;

final class WaitForOp
{
    public static function run(Client $client, string $id, int $intervalMs = 1500, int $timeoutMs = 120000): array
    {
        $start = microtime(true);
        while (true) {
            $res = $client->getOpStatus($id);
            $state = $res->state->value;
            if ($state === 'success' || $state === 'failed') {
                return [
                    'id' => $res->id,
                    'state' => $state,
                    'txHash' => $res->txHash
                ];
            }
            if ((microtime(true) - $start) * 1000 > $timeoutMs) {
                throw new \RuntimeException('Timeout waiting for operation');
            }
            usleep($intervalMs * 1000);
        }
    }
}
