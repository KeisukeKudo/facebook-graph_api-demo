<?php

namespace App\Providers;

use App\Http\Adapters\Connection\Facebook\GraphAPI\AccessTokenAdapter;
use App\Http\Adapters\OAuth\Facebook\AuthorizationAdapter;
use App\Http\Adapters\OAuth\Facebook\UserAdapter;
use Crypto\Connection\Facebook\GraphAPI\AccessTokenPort;
use Crypto\OAuth\Facebook\AuthorizationPort;
use Crypto\OAuth\Facebook\UserPort;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(AuthorizationPort::class, AuthorizationAdapter::class);
        $this->app->bind(UserPort::class, UserAdapter::class);
        $this->app->bind(AccessTokenPort::class, AccessTokenAdapter::class);
    }
}
