<?php


namespace Crypto\OAuth\Facebook\ValueObject;


use Crypto\ValueObjectInterface;

class ProviderId implements ValueObjectInterface
{
    private string $providerId;

    public function __construct(string $providerId)
    {
        assert(trim($providerId) !== '');
        $this->providerId = $providerId;
    }

    public function getValue(): string
    {
        return $this->providerId;
    }
}
