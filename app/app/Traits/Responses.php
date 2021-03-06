<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

trait Responses
{
    /**
     * @param string $messenge
     * @return JsonResponse
     */
    protected function success(
        string $messenge
    ): JsonResponse {
        return response()->json([
            'success' => 'success',
            'messenge' => $messenge,
        ], Response::HTTP_OK);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    protected function successWithArgs(
        $data
    ): JsonResponse {
        return response()->json(
            $data,
            Response::HTTP_OK
        );
    }

    /**
     * @param string $messenge
     * @return JsonResponse
     */
    protected function created(
        string $messenge
    ): JsonResponse {
        return response()->json([
            'status' => 'success',
            'messenge' => $messenge,
        ], Response::HTTP_CREATED);
    }

    /**
     * @param string $messenge
     * @return JsonResponse
     */
    protected function notFound(
        string $messenge
    ): JsonResponse {
        return response()->json([
            'messenge' => $messenge,
        ], Response::HTTP_NOT_FOUND);
    }
}