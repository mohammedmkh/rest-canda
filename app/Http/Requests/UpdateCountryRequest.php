<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return Gate::allows('product_category_edit');
    }

    public function rules()
    {
        return [
            'name' => [
            'string',
            'required',
            ],
        ];
    }
}
