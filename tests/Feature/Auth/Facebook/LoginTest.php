<?php

namespace Tests\Feature\Auth\Facebook;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function GuzzleHttp\Psr7\parse_query;

class LoginTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function リダイレクト先ドメインがFacebookの認可画面である(): void
    {
        $response =
            $this->get(route('facebook.login'))
                ->assertStatus(302);

        $target = parse_url($response->headers->get('location'));

        $this->assertSame('www.facebook.com', $target['host']);
    }

    /**
     * @test
     * @return void
     */
    public function リダイレクト先URLのパラメーターが設定値と同値である(): void
    {
        $response =
            $this->get(route('facebook.login'))
                ->assertStatus(302);

        $target = parse_url($response->headers->get('location'));

        parse_str($target['query'], $query);
        $config = config('services.facebook');

        $this->assertSame($config['redirect'], $query['redirect_uri']);
        $this->assertSame($config['client_id'], $query['client_id']);
    }
}
