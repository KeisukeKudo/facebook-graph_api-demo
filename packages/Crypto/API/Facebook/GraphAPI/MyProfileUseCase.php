<?php

namespace Crypto\API\Facebook\GraphAPI;

use Crypto\API\Facebook\GraphAPI\Fetch\UserPort;

class MyProfileUseCase
{
    private UserPort $port;

    public function __construct(UserPort $port)
    {
        $this->port = $port;
    }

    public function get(): array
    {
        return $this->port->fetch();
    }
}
