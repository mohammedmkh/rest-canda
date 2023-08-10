<?php

namespace App\Http\Requests;

use App\Models\Resturant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateResturantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('resturant_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'lat' => [
                'string',
                'nullable',
            ],
            'long' => [
                'string',
                'nullable',
            ],
        ];
    }
}
