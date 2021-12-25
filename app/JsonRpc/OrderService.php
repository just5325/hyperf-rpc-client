<?php

namespace App\JsonRpc;

use Hyperf\RpcServer\Annotation\RpcService;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Di\Annotation\Inject;

/**
 * 注意，如希望通过服务中心来管理服务，需在注解内增加 publishTo 属性
 * @RpcService(name="OrderService", protocol="jsonrpc-http", server="jsonrpc-http", publishTo="consul")
 */
class OrderService implements OrderServiceInterface
{

    /**
     * 通过 `@Inject` 注解注入由 `@var` 注解声明的属性类型对象
     *
     * @Inject(lazy=true)
     * @var UserServiceInterface
     */
    public $userService;

    public function getOrderInfo(int $id): array
    {
        return ['id' => $id, 'name' => '订单详情', 'user_info' => $this->userService->getUserInfo($id)];
    }
}