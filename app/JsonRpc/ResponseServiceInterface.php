<?php

namespace App\JsonRpc;

interface ResponseServiceInterface
{
    public function ApiSuccess($data = []);
    public function ApiError(int $code, string $error, $data = []);
}
