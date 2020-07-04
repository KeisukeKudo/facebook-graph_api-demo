<?php


namespace Crypto\OAuth\Facebook;


use Crypto\OAuth\Facebook\ValueObject\User;

class LoginUseCase
{
    private UserPort $userPort;

    public function __construct(UserPort $userPort)
    {
        $this->userPort = $userPort;
    }

    public function Login(User $user): void
    {
        $port = $this->userPort->setUser($user);
        !$port->exists() && $port->store();
        $port->auth();
    }
}
