<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class updateADSRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
   public function authorize()
   {
   return Gate::allows('ADS_update');
   }

   public function rules(){

   return [
'title' => [
        'string',
        'required',
   ],

'url' =>[
        'required',
        'url'
        ],

'type' =>[
        'required',
        ],

   ];
   }
}
