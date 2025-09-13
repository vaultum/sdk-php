<?php

use Vaultum\SDK\Client;
use Vaultum\SDK\WaitForOp;

it('waits until terminal state', function () {
    $seq = [
        ['state' => 'queued'],
        ['state' => 'sent'],
        ['state' => 'success', 'txHash' => '0xabc'],
    ];
    $i = 0;

    $client = $this->getMockBuilder(Client::class)
        ->disableOriginalConstructor()
        ->onlyMethods(['getOpStatus'])
        ->getMock();

    $client->method('getOpStatus')->willReturnCallback(function () use (&$i, $seq) {
        $r = $seq[min($i, count($seq) - 1)];
        $i++;
        
        $statusResponse = new \Vaultum\SDK\DTO\StatusResponse(
            'op_test',
            \Vaultum\SDK\Enums\OperationState::from($r['state']),
            $r['txHash'] ?? null
        );
        
        return $statusResponse;
    });

    $res = WaitForOp::run($client, 'op_test', 1, 1000);
    expect($res['state'])->toBe('success');
});
