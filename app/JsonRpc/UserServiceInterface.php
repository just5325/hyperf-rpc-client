<?php

namespace App\JsonRpc;

use Hyperf\RpcServer\Annotation\RpcService;

/**
 * 注意，如希望通过服务中心来管理服务，需在注解内增加 publishTo 属性
 * @RpcService(name="UserService", protocol="jsonrpc-http", server="jsonrpc-http")
 */
interface UserServiceInterface
{
    public function getUserInfo(int $id);
}
