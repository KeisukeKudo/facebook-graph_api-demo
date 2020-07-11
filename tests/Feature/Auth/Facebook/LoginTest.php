<?php

namespace Tests\Feature\Auth\Facebook;

use Tests\TestCase;

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

        self::assertSame('www.facebook.com', $target['host']);
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

        self::assertSame($config['redirect'], $query['redirect_uri']);
        self::assertSame($config['client_id'], $query['client_id']);
    }
}
