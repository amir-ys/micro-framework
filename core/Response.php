<?php

namespace Core;

class Response
{
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const OK = 200;

    public static function success($message = 'success', $data = [])
    {
        http_response_code(static::OK);
        return [
            'message' => $message,
            'date' => $data,
            'status' => static::OK
        ];
    }

    public static function error($message = 'error', $data = [])
    {
        http_response_code(static::NOT_FOUND);
        return [
            'message' => $message,
            'date' => $data,
            'status' => static::NOT_FOUND
        ];
    }
}