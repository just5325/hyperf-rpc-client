<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;
use App\JsonRpc\OrderServiceInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

class OrderController
{

    /**
     * 通过 `@Inject` 注解注入由 `@var` 注解声明的属性类型对象
     *
     * @Inject(lazy=true)
     * @var OrderServiceInterface
     */
    public $orderService;

    // 获取用户信息
    public function getOrderInfo(RequestInterface $request)
    {
        // 从请求中获得 id 参数
        $id = $request->input('id', 1);
        $ret = $this->orderService->getOrderInfo((int)$id);
        return $ret;
    }
}
