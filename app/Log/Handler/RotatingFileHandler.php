<?php

declare(strict_types=1);

namespace App\Log\Handler;

use Monolog\Handler\RotatingFileHandler as MonologRotatingFileHandler;

/*
 * 日志处理器
 * */
class RotatingFileHandler extends MonologRotatingFileHandler
{
    /**
     * 重写write方法
     * 用于未来在写入日志的同时发送日志数据到第三方日志服务平台
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        // todo 说明：$record变量中有我们需要得日志信息，在这里扩展发送日志数据到第三方日志服务平台即可

        parent::write($record);
    }
}
