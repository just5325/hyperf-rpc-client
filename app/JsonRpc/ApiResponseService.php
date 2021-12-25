<?php

namespace App\JsonRpc;

use Hyperf\RpcServer\Annotation\RpcService;

/**
 * Api返回数据统一格式服务
 *
 * 本服务设计的目的是为了方便和统一各微服务输出HTTP API的返回数据格式。
 * 建议本项目中所有的微服务输出HTTP API返回数据格式时，都使用本服务提供的error、success方法
 *
 * @RpcService(name="ApiResponseService", protocol="jsonrpc-http", server="jsonrpc-http", publishTo="consul")
 *
 * @author Hcg <532508307@qq.com>
 */
class ApiResponseService implements ApiResponseServiceInterface
{

    /**
     * 返回数据统一格式
     *
     * @param int $code 接口code码（非HTTP CODE，这个是业务逻辑的接口code码）
     * @param string|array $data 接口返回数据
     * @param string $message 接口提示信息
     *
     * @author Hcg <532508307@qq.com>
     */
    public function responseData(int $code, $data, string $message): array
    {
        return [
            'code' => $code,
            'message'  => $message,
            'data' => $data
        ];
    }

    /**
     * 错误-返回数据统一格式
     *
     * @param int $code 接口code码（非HTTP CODE，这个是业务逻辑的接口code码）
     * @param string $error 接口提示信息
     * @param string|array $data 接口返回数据
     *
     * @author Hcg <532508307@qq.com>
     */
    public function error(int $code = 1, string $error = '',$data = []): array
    {
        return $this->responseData($code, $data, $error);
    }

    /**
     * 成功-返回数据统一格式
     *
     * @param string|array $data 接口返回数据
     * @param string $message 接口提示信息
     *
     * @author Hcg <532508307@qq.com>
     */
    public function success($data = [], string $message = ''): array
    {
        return $this->responseData(200, $data, $message);
    }
}