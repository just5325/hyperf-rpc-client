<?php

declare(strict_types=1);

namespace App\Log\Handler;

use App\JsonRpc\LogServiceInterface;
use Hyperf\Elasticsearch\ClientBuilderFactory;
use Monolog\Handler\RotatingFileHandler as MonologRotatingFileHandler;

/**
 * 日志处理器
 *
 * 这个日志处理器的主要目的，是为了在Monolog\Handler\RotatingFileHandler处理日志之后，
 * 可扩展自己的日志处理逻辑而设计的。
 *
 * @author Hcg <532508307@qq.com>
 */
class RotatingFileHandler extends MonologRotatingFileHandler
{
    /**
     * 重写父类write方法
     * @author Hcg <532508307@qq.com>
     */
    protected function write(array $record): void
    {
        parent::write($record);
        $this->post($record);
    }

    /**
     * 发送日志数据到第三方日志服务平台
     *
     * @param array $record 日志信息
     *
     * @author Hcg <532508307@qq.com>
     */
    protected function post(array $record){
        // todo 在这里扩展发送日志数据到第三方日志服务平台,这里只是简单的把日志信息投递到ELASTICSEARCH，还需要根据业务逻辑进行完善
        \App\Service\LogService::log($record);
    }
}
