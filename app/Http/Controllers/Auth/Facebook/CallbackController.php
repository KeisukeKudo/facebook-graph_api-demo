<?php

namespace App\Http\Controllers\Auth\Facebook;

use App\Http\Controllers\Controller;
use Crypto\OAuth\Facebook\LoginUseCase;
use Crypto\OAuth\Facebook\ValueObject\AccessToken;
use Crypto\OAuth\Facebook\ValueObject\ProviderId;
use Crypto\OAuth\Facebook\ValueObject\ProviderName;
use Crypto\OAuth\Facebook\ValueObject\User;
use Crypto\OAuth\Facebook\ValueObject\UserEmail;
use Crypto\OAuth\Facebook\ValueObject\UserName;
use Illuminate\Http\RedirectResponse;

class CallbackController extends Controller
{
    public function __invoke(LoginUseCase $useCase): RedirectResponse
    {
        $providerName = config('services.facebook.provider_name');
        $facebookUser = \Socialite::driver($providerName)->user();
        $user = new User(
            new UserName($facebookUser->getName()),
            new UserEmail($facebookUser->getEmail()),
            new ProviderId($facebookUser->getId()),
            new ProviderName($providerName),
        );
        $useCase->Login($user)
            ->storeAccessToken(
                new AccessToken($facebookUser->token)
            );

        return redirect()->route('home');
    }
}
