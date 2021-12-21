<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;
use App\JsonRpc\UserServiceInterface;

class UserController
{

    public $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    // 获取用户信息
    public function getUserInfo(RequestInterface $request)
    {
        // 从请求中获得 id 参数
        $id = $request->input('id', 1);
        $ret = $this->userService->getUserInfo((int)$id);
        return $ret;
    }
}
