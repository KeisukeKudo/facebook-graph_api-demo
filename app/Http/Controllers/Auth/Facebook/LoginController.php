<?php

namespace App\Http\Controllers\Auth\Facebook;

use App\Http\Controllers\Controller;
use Crypto\OAuth\Facebook\AuthorizationPort;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * @param AuthorizationPort $adapter
     * @return RedirectResponse
     */
    public function __invoke(AuthorizationPort $adapter): RedirectResponse
    {
        return $adapter->redirect();
    }
}
