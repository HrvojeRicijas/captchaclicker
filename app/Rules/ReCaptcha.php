<?php

namespace App\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

class ReCaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => '6Le_0cUUAAAAAD0Ze_ZZsHemGtdHjVFOOnM72c7Y',
                'response' => request('g-recaptcha-response')
            ]
        ]);

        $body = json_decode((string) $response->getBody());
        return $body->success;
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('You must solve the reCaptcha to register');
    }
}
