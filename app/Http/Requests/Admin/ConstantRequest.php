<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ConstantRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                return [
                    'imageDark'=>'mimes:jpeg,jpg,png',
                    'imageDay'=>'mimes:jpeg,jpg,png',

                ];
            case 'PUT':
            case 'PATCH':
                {
                    return [];
                }
            default:break;
        }

    }
}
