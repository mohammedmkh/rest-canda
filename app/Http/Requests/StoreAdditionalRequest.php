<?php

namespace App\Http\Requests;

use App\Models\Additional;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAdditionalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('additional_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'type' => [
                'string',
                'nullable',
            ],
            'products.*' => [
                'integer',
            ],
            'products' => [
                'array',
            ],
        ];
    }
}
