<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules;
use App\Http\Requests\BaseRequest;

class StoreUserRequest extends BaseRequest
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
            'role' => 'required|exists:roles,id',
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email|max:100',
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
            
        ];
    }
}
