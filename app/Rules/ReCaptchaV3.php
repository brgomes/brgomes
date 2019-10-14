<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReCaptchaV3 implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $recaptcha_url      = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret   = env('RECAPTCHA_SECRET');
        $recaptcha_response = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $value);
        $recaptcha          = json_decode($recaptcha_response);

        if ($recaptcha->success) {
            //if ($recaptcha->score >= 0.5) {
                return true;
            //}
        }

        return false;
    }

    public function message()
    {
        return 'Captcha inválido. Por favor, tente novamente.';
    }
}
