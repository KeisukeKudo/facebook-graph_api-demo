<?php


namespace Crypto\OAuth\Facebook\ValueObject;


class User
{
    private UserName $name;
    private UserEmail $email;
    private ProviderId $providerId;
    private ProviderName $providerName;

    public function __construct(UserName $name, UserEmail $email, ProviderId $providerId, ProviderName $providerName)
    {
        $this->name = $name;
        $this->email = $email;
        $this->providerId = $providerId;
        $this->providerName = $providerName;
    }

    /**
     * @return array [
     *     'name' => 'string',
     *     'email' => 'string',
     *     'provider_id' => 'string',
     *     'provider_name' => 'string',
     * ]
     */
    public function getValue(): array
    {
        return [
            'name'=> $this->name,
            'email'=> $this->email,
            'provider_id'=> $this->providerId,
            'provider_name'=> $this->providerName,
        ];
    }
}
