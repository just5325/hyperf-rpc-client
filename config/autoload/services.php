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
    'consumers' => [
        [
            // 用户服务
            'name' => 'UserService',
            // 服务接口名，可选，默认值等于 name 配置的值，如果 name 直接定义为接口类则可忽略此行配置，如 name 为字符串则需要配置 service 对应到接口类
            'service' => \App\JsonRpc\UserServiceInterface::class,
            // 服务提供者的服务协议，可选，默认值为 jsonrpc-http
            'protocol' => 'jsonrpc-http',
            'nodes' => [
                // Provide the host and port of the service provider.
                ['host' => '127.0.0.1', 'port' => 9503],
            ],
        ]
    ]
];