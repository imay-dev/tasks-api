<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

/**
 * Class ResetPassword
 * @package App\Http\Requests\Auth
 */
class ResetPassword extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => 'required|string|email|max:190',
            'password' => 'required|confirmed|min:6',
            'token'    => 'required',
        ];
    }
}
