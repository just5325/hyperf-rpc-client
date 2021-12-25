<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;
use App\JsonRpc\OrderServiceInterface;
use App\JsonRpc\ResponseServiceInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

class OrderController
{

    /**
     * 通过 `@Inject` 注解注入由 `@var` 注解声明的属性类型对象
     *
     * @Inject(lazy=true)
     * @var OrderServiceInterface
     */
    public $orderService;

    /**
     * 通过 `@Inject` 注解注入由 `@var` 注解声明的属性类型对象
     *
     * @Inject(lazy=true)
     * @var ResponseServiceInterface
     */
    public $responseService;

    // 获取用户信息
    public function getOrderInfo(RequestInterface $request)
    {
        throw new \App\Exception\ApiException('手动抛出接口异常');
        // 从请求中获得 id 参数
        $id = $request->input('id', 1);
        $ret = $this->orderService->getOrderInfo((int)$id);
        return $this->responseService->ApiSuccess($ret);
    }
}
