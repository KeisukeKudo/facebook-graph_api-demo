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
     *     'name' => new UserName,
     *     'email' => new UserEmail,
     *     'provider_id' => new ProviderId,
     *     'provider_name' => new ProviderName,
     * ]
     */
    public function getValue(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'provider_id' => $this->providerId,
            'provider_name' => $this->providerName,
        ];
    }
}
