<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ReCaptchaV3;

class ContatoValidationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'      => 'required',
            'email'     => 'required|email',
            'assunto'   => 'required',
            'mensagem'  => 'required',
            'recaptcha' => new ReCaptchaV3(),
        ];
    }
}
