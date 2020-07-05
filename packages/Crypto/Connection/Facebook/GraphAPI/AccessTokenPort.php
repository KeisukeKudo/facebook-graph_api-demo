<?php

namespace Crypto\Connection\Facebook\GraphAPI;

use Crypto\OAuth\Facebook\ValueObject\AccessToken;

interface AccessTokenPort
{
    public function store(AccessToken $token): void;
    public function get(): ?AccessToken;
}
