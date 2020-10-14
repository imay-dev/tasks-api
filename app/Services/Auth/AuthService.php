<?php

namespace App\Services\Auth;


use App\Entities\User;

use Illuminate\Auth\AuthManager;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Passwords\PasswordBrokerManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Laravel\Passport\PersonalAccessTokenResult;


/**
 * Class AuthService
 * @package App\Services
 */
class AuthService
{
    /**
     * @var AuthManager
     */
    protected $authManager;
    /**
     * @var PasswordBrokerManager
     */
    protected $passwordBrokerManager;
    /**
     * @var User
     */
    protected $user;

    /**
     * AuthService constructor.
     *
     * @param AuthManager $authManager
     * @param PasswordBrokerManager $passwordBrokerManager
     * @param User $user
     */
    public function __construct(AuthManager $authManager, PasswordBrokerManager $passwordBrokerManager, User $user)
    {
        $this->authManager = $authManager;
        $this->passwordBrokerManager = $passwordBrokerManager;
        $this->user = $user;
    }

    /**
     * @param $credentials
     *
     * @return bool
     */
    public function authenticate($credentials)
    {
        return $this->authManager
            ->guard()
            ->attempt($credentials);
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function register(Request $request)
    {
        return $this->user->create(
            $request->only('name', 'email', 'password')
        );
    }

    /**
     * @param Request $request
     * @param User|null $user
     *
     * @return PersonalAccessTokenResult
     */
    public function generateAccessToken(Request $request, User $user = null)
    {
        return $request->user() ? $request->user()->createToken('Personal Access Token') : $user->createToken('Personal Access Token');
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function forgotPassword(Request $request)
    {
        $response = $this->passwordBrokerManager->sendResetLink(
            $request->only('email')
        );

        return $response === Password::RESET_LINK_SENT;
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function resetPassword(Request $request)
    {
        $response = $this->passwordBrokerManager->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, $password) {
                $user->password = $password;
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $response === Password::PASSWORD_RESET;

    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function logout(Request $request)
    {
        return $request->user()->token()->revoke();
    }

}
