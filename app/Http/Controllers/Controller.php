<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
