<?php


namespace Crypto\OAuth\Facebook;

interface AuthorizationPort
{
    /**
     * @return mixed
     */
    public function redirect();
}
