<?php

namespace Tests\Feature\API;

use App\User;
use Crypto\API\Facebook\GraphAPI\Fetch\UserPort;
use Crypto\API\Facebook\GraphAPI\MyProfileUseCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $adapter = new class implements UserPort {
            public function fetch(): array
            {
                return [
                    'name' => 'string',
                    'picture' => [
                        'data' => [
                            'height' => 720,
                            'is_silhouette' => false,
                            'url' => 'string',
                            'width' => 720,
                        ],
                    ],
                    'id' => 'string',
                ];
            }
        };
        $this->app->bind(
            MyProfileUseCase::class,
            fn() => new MyProfileUseCase($adapter)
        );
    }

    /**
     * @test
     */
    public function JSONのフォーマットが正しい(): void
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)
            ->json('GET', route('api.facebook.me'))
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'string',
                'picture' => [
                    'data' => [
                        'height' => 720,
                        'is_silhouette' => false,
                        'url' => 'string',
                        'width' => 720,
                    ],
                ],
                'id' => 'string',
            ]);
    }

    public function 未認証の場合401が返る(): void
    {
        $this->json('GET', route('api.facebook.me'))
            ->assertStatus(401);
    }
}
