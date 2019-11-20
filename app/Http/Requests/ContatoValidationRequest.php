<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\URL;
use App\Rules\ReCaptchaV3;

class ContatoValidationRequest extends FormRequest
{
    protected $redirect = '/#contato';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $this->redirect = URL::previous() . '#contato';

        return [
            'nome'      => 'required',
            'email'     => 'required|email',
            'assunto'   => 'required',
            'mensagem'  => 'required',
            'recaptcha' => new ReCaptchaV3(),
        ];
    }

    public function messages()
    {
        if (\Lang::locale() == 'en') {
            return [
                'nome.required'     => 'The name field is required.',
                'email.required'    => 'The e-mail field is required.',
                'email.email'       => 'The e-mail must be a valid e-mail address.',
                'assunto.required'  => 'The subject field is required.',
                'mensagem.required' => 'The message field is required.',
            ];
        } elseif (\Lang::locale() == 'es') {
            return [
                'nome.required'     => 'El campo nombre es obligatorio.',
                'email.required'    => 'El campo correo electrónico es obligatorio.',
                'email.email'       => 'El correo electrónico debe tener un formato válido.',
                'assunto.required'  => 'El campo asunto es obligatorio.',
                'mensagem.required' => 'El campo mensaje es obligatorio.',
            ];
        } else {
            return [
                'nome.required'     => 'O campo nome é obrigatório.',
                'email.required'    => 'O campo e-mail é obrigatório.',
                'email.email'       => 'O campo e-mail deve ser um endereço de e-mail válido.',
                'assunto.required'  => 'O campo assunto é obrigatório.',
                'mensagem.required' => 'O campo mensagem é obrigatório.',
            ];
        }
    }
}
