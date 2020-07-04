<?php


namespace Crypto\OAuth\Facebook\ValueObject;


use Crypto\ValueObjectInterface;

class UserName implements ValueObjectInterface
{
    private string $name;

    public function __construct(string $name)
    {
        assert(trim($name) !== '');
        $this->name = $name;
    }

    public function getValue():string
    {
        return $this->name;
    }
}
