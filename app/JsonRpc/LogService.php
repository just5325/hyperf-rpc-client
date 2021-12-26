<?php

namespace App\JsonRpc;

use Hyperf\Elasticsearch\ClientBuilderFactory;
use Hyperf\RpcServer\Annotation\RpcService;

/**
 * Api返回数据统一格式服务
 *
 * @RpcService(name="LogService", protocol="jsonrpc-http", server="jsonrpc-http", publishTo="consul")
 *
 * @author Hcg <532508307@qq.com>
 */
class LogService implements LogServiceInterface
{
    public function log($record)
    {
        return \App\Service\LogService::log($record);
    }
}