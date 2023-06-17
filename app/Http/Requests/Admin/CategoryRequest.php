<?php

namespace App\Http\Requests\Admin;
use App\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                    'parent_id'=> 'nullable|integer',
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
