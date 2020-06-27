<?php

namespace Tests\Unit;

use Crypto\API\Facebook\GraphAPI\Example;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest(): void
    {
        $example = new Example();
        $this->assertTrue($example->example());
    }
}
