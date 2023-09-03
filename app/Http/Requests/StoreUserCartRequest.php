<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserCartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return Gate::allows('show_user_cart');
    }

    public function rules(){

        return [
            'amount' => [
            '   required',

            ],
            'resturant_id' => [
                 'required',

            ],
            'product_id' => [
                'required',

            ],

            'user_id' =>
            [
                'required',
            ],
        ];
    }
}
