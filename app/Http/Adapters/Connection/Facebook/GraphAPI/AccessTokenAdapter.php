<?php

namespace App\Http\Adapters\Connection\Facebook\GraphAPI;

use Crypto\Connection\Facebook\GraphAPI\AccessTokenPort;
use Crypto\OAuth\Facebook\ValueObject\AccessToken;

final class AccessTokenAdapter implements AccessTokenPort
{
    private string $SESSION_KEY;

    public function __construct()
    {
        $this->SESSION_KEY = config('services.facebook.provider_name') . '_token';
    }

    public function store(AccessToken $token): void
    {
        session([$this->SESSION_KEY => $token->getValue()]);
    }

    public function get(): ?AccessToken
    {
        $token = session($this->SESSION_KEY, '');

        return $token !== '' ? new AccessToken($token) : null;
    }
}
