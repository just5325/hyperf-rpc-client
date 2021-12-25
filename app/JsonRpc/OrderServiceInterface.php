<?php

namespace App\JsonRpc;

use Hyperf\RpcServer\Annotation\RpcService;

interface OrderServiceInterface
{
    public function getOrderInfo(int $id);
}
