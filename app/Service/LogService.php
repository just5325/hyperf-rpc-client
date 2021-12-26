<?php

declare(strict_types=1);

namespace App\Service;

use Hyperf\Elasticsearch\ClientBuilderFactory;
use Hyperf\HttpServer\Contract\RequestInterface;
use App\JsonRpc\OrderServiceInterface;
use App\JsonRpc\ApiResponseServiceInterface;
use App\JsonRpc\LogServiceInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Logger\LoggerFactory;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;
use Psr\Log\LoggerInterface;

class LogService
{
    public static function log($record){
        // 如果在协程环境下创建，则会自动使用协程版的 Handler，非协程环境下无改变
        $builder = (new ClientBuilderFactory)->create();
        $client = $builder->setHosts([env('ELASTICSEARCH_URI', '')])->build();
        $params = [
            'index' => 'hyperf-rpc-client',
            'id'    => 'my_id',
            'body'  => $record
//            'body'  => ['testField' => 'abc']
        ];
        return $client->index($params);
    }
}