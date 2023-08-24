<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
     public function authorize()
     {
        return Gate::allows('city_create');
     }

     public function rules(){

        return [
            'name' =>
                [
                    'string',
                    'required',
                ],
        ];
     }
}
