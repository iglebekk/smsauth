<?php

namespace App\Http\Controllers;

use App\Http\Services\SendMessageServices;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller {
    public function send(Request $request): JsonResponse {
        $validator = Validated(
            $request->all(),
            [
                'receiver' => ['string', 'required'],
                'timeout' => ['string']
            ]
        );

        if ($validator->fails()) {
            Log::error('Validator failed');
            return $this->jsonResponse(false, ['message' => 'Validator failed'], 500);
        }

        $code = Str::random(5);
        $sender = 'SenderName';
        $receiver = $validator->safe()->only(['receiver']);
        $timeout = $validator->safe()->only(['timeout']);
        $timeout = Carbon::now()->addSeconds($timeout ?? 120);

        if (!(new SendMessageServices)->send($receiver, $sender, $code)) {
            Log::error('Sending message failed');
            return $this->jsonResponse(false, ['message' => 'Sending message failed'], 500);
        }
    }
}
