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
            'ordem'         => 'required|numeric|max:99',
            'totalpaginas'  => 'required|numeric|max:4000',
        ];
    }

    public function messages()
    {
        return [
            'dataaquisicao.required'    => 'O campo data de aquisição é obrigatório.',
            'dataaquisicao.date'        => 'A data de aquisição não é uma data válida.',
            'totalpaginas.required'     => 'O campo total de páginas é obrigatório.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $json   = ['errors' => $errors];

        throw new HttpResponseException(response()->json($json, JsonResponse::HTTP_UNPROCESSABLE_ENTITY)); // Erro 422
    }
}
