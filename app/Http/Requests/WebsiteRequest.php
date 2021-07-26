<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteRequest extends FormRequest
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
            'url'               =>  'url|required|unique:website',
            'descripton'        =>  'string',
            'domain_authority'  =>  'integer|required|max:100',
            'page_authority'    =>  'integer|required|max:100',
            'price'             =>  'integer|required',
            'delivery_time'     =>  'required|max:14',
            'categories_id'          =>  'required|array|min:1',
            'categories_id.*'        =>  'required|integer|exists:categories,id',
        ];
    }
}
