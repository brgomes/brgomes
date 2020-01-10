<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class IndiceValidationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'indice'    => 'required',
            'mes'       => 'required|numeric|min:1|max:12',
            'ano'       => 'required|numeric|min:1990|max:' . date('Y'),
            //'valor'     => 'required|regex:/^\d{1,3}(?:\.\d{3})*,\d{2,4}$/',
            'valor'     => 'required|numeric',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $json   = ['errors' => $errors];

        throw new HttpResponseException(response()->json($json, JsonResponse::HTTP_UNPROCESSABLE_ENTITY)); // Erro 422
    }
}
