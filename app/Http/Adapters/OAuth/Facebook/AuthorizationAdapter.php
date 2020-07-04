<?php


namespace App\Http\Adapters\OAuth\Facebook;


use Crypto\OAuth\Facebook\AuthorizationPort;
use Illuminate\Http\RedirectResponse;

final class AuthorizationAdapter implements AuthorizationPort
{

    public function redirect(): RedirectResponse
    {
        return \Socialite::driver('facebook')->redirect();
    }
}
