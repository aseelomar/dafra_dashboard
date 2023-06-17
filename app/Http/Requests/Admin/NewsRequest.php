<?php

namespace App\Http\Requests\Admin;

use App\News;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
                    'title'=>'required|string|min:6|max:255',
                    'description'=>'required',
                    'category_id'=> 'required|integer',
                    'image'=>'required|mimes:jpeg,jpg,png',
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
