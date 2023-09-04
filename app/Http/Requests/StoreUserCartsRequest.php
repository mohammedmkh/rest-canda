<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserCartsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /* public function authorize(): bool
    {
        return false;
    } */

     public function authorize()
     {
        return Gate::allows('favorite_create');
     }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
         return [
            'amount' => [
                'required',

        ],

            'product_id' => [
                'required',
        ],


        ];
    }
}
