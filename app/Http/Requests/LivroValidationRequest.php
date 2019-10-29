<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LivroValidationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'          => 'required',
            'dataaquisicao' => 'required|date',
            'ordem'         => 'required',
            'totalpaginas'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'dataaquisicao.required'    => 'O campo data de aquisição é obrigatório',
            'totalpaginas.required'     => 'O campo total de páginas é obrigatório',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        $json = [
            'status'    => 'error',
            'message'   => 'Não foi possível completar a operação',
            'errors'    => $errors
        ];

        throw new HttpResponseException(response()->json($json, JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
