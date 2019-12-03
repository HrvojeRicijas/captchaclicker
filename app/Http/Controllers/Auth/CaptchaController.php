<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Request;

class CaptchaController extends Controller
{
    public function check()
    {
        $client = new Client();
        $result = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => '6Le_0cUUAAAAAD0Ze_ZZsHemGtdHjVFOOnM72c7Y',
                'response' => request('g-recaptcha-response')
            ]
        ]);
        dump(request('g-recaptcha-response'));
        $result = json_decode($result->getBody()->getContents());
        return view("test", ['response'=>$result]);
    }
}
