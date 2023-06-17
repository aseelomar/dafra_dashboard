<?php

namespace App\Http\Requests\Admin\Video;

use Illuminate\Foundation\Http\FormRequest;

class VideoUpdateRequest extends FormRequest
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
                    'link'=>'required|url',
                    'episode'=>'nullable|numeric',
                    'part'=>'nullable|numeric',
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
