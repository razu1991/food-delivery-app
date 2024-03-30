<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($data, string $message = 'Operation successful', int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public static function error($errors, string $message = 'Operation failed', int $code = 400): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'code' => $code,
            'message' => $message,
            'errors' => $errors
        ], $code);
    }
}

?>
