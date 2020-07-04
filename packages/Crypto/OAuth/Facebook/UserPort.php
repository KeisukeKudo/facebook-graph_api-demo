<?php


namespace Crypto\OAuth\Facebook;


use Crypto\OAuth\Facebook\ValueObject\User;

interface UserPort
{
    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user): self;
    /**
     * @return User|null
     */
    public function user(): ?User;

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
}
