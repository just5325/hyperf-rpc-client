<?php

namespace App\JsonRpc;

use Hyperf\RpcServer\Annotation\RpcService;
use Hyperf\Contract\ConfigInterface;

/**
 * 注意，如希望通过服务中心来管理服务，需在注解内增加 publishTo 属性
 * @RpcService(name="OrderService", protocol="jsonrpc-http", server="jsonrpc-http", publishTo="consul")
 */
class OrderService implements OrderServiceInterface
{
    public function getOrderInfo(int $id): array
    {
        return ['id' => $id, 'name' => '订单详情'];
    }
}