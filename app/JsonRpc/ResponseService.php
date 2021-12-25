<?php

namespace App\JsonRpc;

use Hyperf\RpcServer\Annotation\RpcService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;
/**
 * @RpcService(name="ResponseService", protocol="jsonrpc-http", server="jsonrpc-http", publishTo="consul")
 */
class ResponseService implements ResponseServiceInterface
{
    public function ApiError(int $code = 1, string $error = '',$data = []): array
    {
        return [
            'code' => $code,
            'message'  => '',
            'data' => $data
        ];
    }

    public function ApiSuccess($data = []): array
    {
        return [
            'code' => 200,
            'message'  => 'success',
            'data' => $data
        ];
    }
}