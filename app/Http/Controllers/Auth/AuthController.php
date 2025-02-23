<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Entities\DataTransferObjects\LoginUser\LoginSendOtpDTO;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Resources\User\UserResource;
use App\Processes\Auth\SendOtpProcess;
use App\Processes\Auth\VerifyOtpProcess;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    private SendOtpProcess $sendOtpProcess;
    private VerifyOtpProcess $verifyOtpProcess;

    public function __construct(SendOtpProcess $sendOtpProcess, VerifyOtpProcess $verifyOtpProcess)
    {
        $this->sendOtpProcess = $sendOtpProcess;
        $this->verifyOtpProcess = $verifyOtpProcess;
    }

    public function sendOtp(AuthRequest $request): JsonResponse
    {
        try {
            $dataDto = LoginSendOtpDTO::fromArray($request->validated());
            $this->sendOtpProcess->run($dataDto);

            return response()->json(['message' => 'OTP sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function verifyOtp(AuthRequest $request): JsonResponse
    {
        $dataDto = LoginSendOtpDTO::fromArray($request->validated());

        $result = $this->verifyOtpProcess->run($dataDto);
        if (isset($result->token['error']) && $result->token['error'] == true) {
            return response()->json(['message' => $result->token['message']], $result->token['status']);
        }

        return response()->json([
            'access_token' => $result->token,
            'token_type' => 'Bearer',
            'user' => new UserResource($result->user),
        ]);

    }
}
