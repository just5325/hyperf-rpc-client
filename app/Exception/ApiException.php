<?php
namespace App\Exception;

use Hyperf\Server\Exception\ServerException;

/**
 * Api异常类
 *
 * 本异常类设计的目的是为了方便在写HTTP API接口时，出现异常可以方便的已API友好的返回异常错误信息。
 *
 * @author Hcg <532508307@qq.com>
 */
class ApiException extends ServerException
{
}