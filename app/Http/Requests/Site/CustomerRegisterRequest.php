<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisterRequest extends FormRequest
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
     * Get the validation rules that     }
    apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName'=>'required|min:3,max:100',
            'familyName'=>'required|min:3,max:100',
            'password' => 'required|between:6,16|confirmed',
            'password_confirmation' => 'required|between:6,16',
            'email' => 'required|email|unique:customers,email',
//            'g-recaptcha-response' => 'required|captcha',
        ];
    }

}
