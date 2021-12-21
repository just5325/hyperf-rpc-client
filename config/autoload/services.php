<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    // 此处省略了其它同层级的配置
    'consumers' => value(function () {
        $consumers = [];
        // 这里自动创建代理消费者类的配置形式，顾存在 name 和 service 两个配置项，这里的做法不是唯一的，仅说明可以通过 PHP 代码来生成配置
        $services = [
            'UserService' => \App\JsonRpc\UserServiceInterface::class,
        ];
        foreach ($services as $name => $interface) {
            $consumers[] = [
                // 服务名
                'name' => $name,
                // 服务接口名，可选，默认值等于 name 配置的值，如果 name 直接定义为接口类则可忽略此行配置，如 name 为字符串则需要配置 service 对应到接口类
                'service' => $interface,
                // 服务提供者的服务协议，可选，默认值为 jsonrpc-http
                'protocol' => 'jsonrpc-http',
                'nodes' => [
                    // Provide the host and port of the service provider.
                    ['host' => '127.0.0.1', 'port' => 9503],
                ],
            ];
        }
        return $consumers;
    }),
];