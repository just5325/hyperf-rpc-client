<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;
use App\JsonRpc\OrderServiceInterface;
use App\JsonRpc\ApiResponseServiceInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Logger\LoggerFactory;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;
use Psr\Log\LoggerInterface;

class OrderController
{

    /**
     * @Inject(lazy=true)
     * @var OrderServiceInterface
     */
    public $orderService;

    /**
     * @Inject(lazy=true)
     * @var ApiResponseServiceInterface
     */
    public $apiResponseService;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(LoggerFactory $loggerFactory)
    {
        // 第一个参数对应日志的 name, 第二个参数对应 config/autoload/logger.php 内的 key
        $this->logger = $loggerFactory->get('log', 'default');
    }

    // 获取用户信息
    public function getOrderInfo(RequestInterface $request): array
    {
        $this->logger->info("测试日志信息", ['a'=>1,'b'=>2]);
        $this->logger->error("测试错误信息", ['a'=>10,'b'=>20]);
        $this->logger->debug("测试debug信息", ['a'=>100,'b'=>200]);
//        throw new \App\Exception\ApiException('手动抛出接口异常');
        // 从请求中获得 id 参数
        $id = $request->input('id', 1);
        $ret = $this->orderService->getOrderInfo((int)$id);
        return $this->apiResponseService->success($ret);
    }

}
