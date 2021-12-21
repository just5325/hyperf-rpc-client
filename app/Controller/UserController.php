<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;
use App\JsonRpc\UserServiceInterface;
use Hyperf\Di\Annotation\Inject;

class UserController
{

    /**
     * 通过 `@Inject` 注解注入由 `@var` 注解声明的属性类型对象
     *
     * @Inject(lazy=true)
     * @var UserServiceInterface
     */
    public $userService;

    // 获取用户信息
    public function getUserInfo(RequestInterface $request)
    {
        // 从请求中获得 id 参数
        $id = $request->input('id', 1);
        $ret = $this->userService->getUserInfo((int)$id);
        return $ret;
    }
}
