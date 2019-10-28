<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContatoValidationRequest;
use Mail;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('index');
    }

    public function enviarEmail(ContatoValidationRequest $request)
    {
        try {
            $data = $request->all();

            Mail::send('emails.contato', $data, function($message) use ($data) {
                //$message->from($data['email'], $data['nome']);
                $message->from(env('MAIL_USERNAME'));
                $message->replyTo($data['email'], $data['nome']);
                $message->subject($data['assunto']);
                $message->to('bruno@brgomes.com', 'Bruno R. Gomes');
            });
        } catch (\Exception $e) {
            //dd($e->getMessage());
            return redirect()->to('/#contato')->with('error', 'No momento o contato não pôde ser enviado. Por favor, tente novamente mais tarde.')->withInput();
        }

        return redirect()->to('/#contato')->with('success', 'Obrigado! Seu contato foi enviado com sucesso.');
    }
}
