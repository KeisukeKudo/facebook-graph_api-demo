<?php


namespace Crypto\OAuth\Facebook;


use Crypto\OAuth\Facebook\ValueObject\ProviderId;
use Crypto\OAuth\Facebook\ValueObject\ProviderName;
use Crypto\OAuth\Facebook\ValueObject\User;
use Crypto\OAuth\Facebook\ValueObject\UserEmail;
use Crypto\OAuth\Facebook\ValueObject\UserName;

interface UserPort
{
    /**
     * @param User|null $user
     * @return User|null
     */
    public function user(User $user = null): ?User;

    /**
     * @return bool
     */
    public function exists(): bool;

    /**
     * @return bool
     */
    public function store(): bool;

    /**
     * @return bool 認証成功なら true
     */
    public function auth(): bool;

    /**
     * @param User $user
     * @return UserPort
     */
    public function newUser(User $user): self;
}
