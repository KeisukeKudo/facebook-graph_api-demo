<?php


namespace Crypto\OAuth\Facebook\ValueObject;


use Crypto\ValueObjectInterface;

class ProviderName implements ValueObjectInterface
{
    private string $providerName;

    public function __construct(string $providerName)
    {
        assert(trim($providerName) !== '');
        $this->providerName = $providerName;
    }

    public function getValue(): string
    {
        return $this->providerName;
    }
}
