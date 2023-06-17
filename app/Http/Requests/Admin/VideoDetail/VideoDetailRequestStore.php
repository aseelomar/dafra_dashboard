<?php

namespace App\Http\Requests\Admin\VideoDetail;

use Illuminate\Foundation\Http\FormRequest;

class VideoDetailRequestStore extends FormRequest
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
                    'name'=>'required|string|min:3|max:255',
                    'description'=>'required',
                    'category_id'=> 'required|integer',
                    'image'=>'required|mimes:jpeg,jpg,png',
                    'time'=>'required',
                ];
            case 'PUT':
            case 'PATCH':
                {
                    return [

                    ];
                }
            default:break;
        }

    }

}
