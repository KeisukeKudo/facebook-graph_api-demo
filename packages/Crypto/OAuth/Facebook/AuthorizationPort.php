<?php


namespace Crypto\OAuth\Facebook;

use \Symfony\Component\HttpFoundation\RedirectResponse;

interface AuthorizationPort
{
    /**
     * @return RedirectResponse
     */
    public function redirect(): RedirectResponse;
}
