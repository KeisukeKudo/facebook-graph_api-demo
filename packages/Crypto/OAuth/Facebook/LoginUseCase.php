<?php

namespace Crypto\OAuth\Facebook;

use Crypto\Connection\Facebook\GraphAPI\AccessTokenPort;
use Crypto\OAuth\Facebook\ValueObject\AccessToken;
use Crypto\OAuth\Facebook\ValueObject\User;

class LoginUseCase
{
    private UserPort $userPort;
    private AccessTokenPort $tokenPort;

    public function __construct(UserPort $userPort, AccessTokenPort $tokenPort)
    {
        $this->userPort = $userPort;
        $this->tokenPort = $tokenPort;
    }

    public function Login(User $user): self
    {
        $port = $this->userPort->setUser($user);
        !$port->exists() && $port->store();
        $port->auth();

        return $this;
    }

    public function storeAccessToken(AccessToken $token): self
    {
        $this->tokenPort->store($token);

        return $this;
    }
}
