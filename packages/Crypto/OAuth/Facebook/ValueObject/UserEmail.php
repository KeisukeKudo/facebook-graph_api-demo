<?php


namespace Crypto\OAuth\Facebook\ValueObject;


use Crypto\ValueObjectInterface;

class UserEmail implements ValueObjectInterface
{
    private string $email;

    public function __construct(string $email)
    {
        assert(filter_var($email, FILTER_VALIDATE_EMAIL) !== false);
        $this->email = $email;
    }

    public function getValue(): string
    {
        return $this->email;
    }
}
