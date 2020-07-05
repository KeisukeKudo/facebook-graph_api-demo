<?php

namespace Crypto\OAuth\Facebook\ValueObject;

use Crypto\ValueObjectInterface;

class AccessToken implements ValueObjectInterface
{
    private string $token;

    public function __construct(string $token)
    {
        assert(trim($token) !== '');
        $this->token = $token;
    }

    public function getValue(): string
    {
        return $this->token;
    }
}
