<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\MainController;

use App\Http\Requests\Auth\ForgotPassword;
use App\Http\Requests\Auth\Login;
use App\Http\Requests\Auth\Register;
use App\Http\Requests\Auth\ResetPassword;

use App\Http\Resources\Auth\User;

use App\Services\Auth\AuthService;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class AuthController extends MainController
{

    /**
     * @param Login $request
     * @param AuthService $authService
     *
     * @return JsonResponse
     */
    public function login(Login $request, AuthService $authService)
    {
        $credentials = $request->only('email', 'password');

        if (!$authService->authenticate($credentials)) {
            return $this->response->fail([
                'errors' => [
                    'failed' => 'Invalid credentials.',
                ],
            ]);
        }

        $token = $authService->generateAccessToken($request);

        return $this->response->success((new User($request->user()))
            ->additional([
                'meta' => [
                    'accessToken' => $token->accessToken,
                    'expiresIn' => $token->token->expires_at,
                ],
            ])
        );
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function profile(Request $request)
    {
        return $this->response->success(new User($request->user()));
    }

    /**
     * @param Register $request
     * @param AuthService $authService
     *
     * @return JsonResponse
     */
    public function register(Register $request, AuthService $authService)
    {
        $user = $authService->register($request);

        $token = $authService->generateAccessToken($request, $user);

        return $this->response->success((new User($user))
            ->additional([
                'meta' => [
                    'accessToken' => $token->accessToken,
                    'expiresIn' => $token->token->expires_at,
                ],
            ])
        );
    }

    /**
     * @param ForgotPassword $request
     * @param AuthService $authService
     *
     * @return JsonResponse
     */
    public function forgotPassword(ForgotPassword $request, AuthService $authService)
    {
        if (!$authService->forgotPassword($request)) {
            return $this->response->fail();
        }

        return $this->response->success([
            'message' => $request->input('email') . ' password reset link will be sent soon!',
        ]);
    }

    /**
     * Just a placeholder to avoid returning errors
     * The reset step must get triggered by Front-end
     * @return JsonResponse
     */
    public function resetPasswordByToken()
    {
        return $this->response->success([
            'token' => request()->get('token'),
            'email' => request()->get('email'),
            'message' => 'Use token to reset your password',
        ]);
    }

    /**
     * @param ResetPassword $request
     * @param AuthService $authService
     *
     * @return JsonResponse
     */
    public function resetPassword(ResetPassword $request, AuthService $authService)
    {
        if (!$authService->resetPassword($request)) {
            return $this->response->fail();
        }

        return $this->response->success([
            'message' => $request->input('email') . ' password changed!',
        ]);
    }

    /**
     * @param Request $request
     * @param AuthService $authService
     *
     * @return JsonResponse
     */
    public function logout(Request $request, AuthService $authService)
    {
        $authService->logout($request);

        return $this->response->success();
    }

}
