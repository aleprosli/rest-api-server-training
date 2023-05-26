<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ResponseAPI
{
    public function success(mixed $data, $message = 'success', int $statusCode = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'meta' => [
                'timestamp' => Carbon::now()->setTimezone('Asia/Kuala_Lumpur')->format('d-m-Y H:i:s')
            ],
        ], $statusCode);
    }
    
    public function error(mixed $data, string $message = '', int $statusCode = 500)
    {
        if (!$message) {
            $message = Response::$statusTexts[$statusCode];
        }

        $data = [
            'message' => $message,
            'errors' => $data,
        ];

        return response()->json([$data, $statusCode]);
    }

    public function ok(mixed $data)
    {
        return $this->success($data);
    }

    public function created(mixed $data)
    {
        return $this->success($data, 201);
    }

    public function noContent()
    {
        return $this->success([], 204);
    }

    public function badRequest(mixed $data, string $message = '')
    {
        return $this->error($data, $message, 400);
    }

    public function unauthorized(mixed $data, string $message = '')
    {
        return $this->error($data, $message, 401);
    }

    public function forbidden(mixed $data, string $message = '')
    {
        return $this->error($data, $message, 403);
    }

    public function notFound(mixed $data, string $message = '')
    {
        return $this->error($data, $message, 404);
    }

    public function conflict(mixed $data, string $message = '')
    {
        return $this->error($data, $message, 409);
    }

    public function unprocessable(mixed $data, string $message = '')
    {
        return $this->error($data, $message, 422);
    }
}