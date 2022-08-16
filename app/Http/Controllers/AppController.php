<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class AppController extends Controller {
    public function jsonResponse(
        bool $success = true,
        array $data = null,
        int $code = null,
        $headers = null
    ): JsonResponse {
        return response()->json([
            'success' => $success,
            'data' => $data,
        ], $code, $headers);
    }
}
