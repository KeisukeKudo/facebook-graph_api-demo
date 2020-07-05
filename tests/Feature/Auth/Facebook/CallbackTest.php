<?php

namespace Tests\Feature\Auth\Facebook;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Socialite\Contracts\Provider as SocialiteProvider;
use Laravel\Socialite\Two\User as SocialiteUser;
use Laravel\Socialite\Two\User as UserMock;
use Mockery;
use Socialite;
use Tests\TestCase;

class CallbackTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    private string $providerName;
    private UserMock $user;

    protected function setUp(): void
    {
        parent::setUp();

        Mockery::getConfiguration()->allowMockingNonExistentMethods(false);

        $this->providerName = config('services.facebook.provider_name');
        $this->user = Mockery::mock(SocialiteUser::class);
        $this->user->shouldReceive('getId')
            ->andReturn(uniqid('', true));
        $this->user->shouldReceive('getEmail')
            ->andReturn($this->faker->email);
        $this->user->shouldReceive('getName')
            ->andReturn($this->faker->name);

        $provider = Mockery::mock(SocialiteProvider::class);
        $provider->shouldReceive('user')->andReturn($this->user);

        Socialite::shouldReceive('driver')->with($this->providerName)->andReturn($provider);
    }

    public static function tearDownAfterClass(): void
    {
        Mockery::getConfiguration()->allowMockingNonExistentMethods(true);
    }

    /**
     * @test
     */
    public function ホームへリダイレクトされる(): void
    {
        $this->get(route('facebook.callback'))
            ->assertStatus(302)
            ->assertRedirect(route('home'));
    }

    /**
     * @test
     */
    public function データベースにユーザー登録される(): void
    {
        $this->get(route('facebook.callback'));
        $this->assertDatabaseHas('users', [
            'name' => $this->user->getName(),
            'email' => $this->user->getEmail(),
            'provider_id' => $this->user->getId(),
            'provider_name' => $this->providerName,
        ]);
    }


    /**
     * @test
     */
    public function 既存ユーザーが2重登録されない(): void
    {
        factory(User::class)->create([
            'name' => $this->user->getName(),
            'email' => $this->user->getEmail(),
            'provider_id' => $this->user->getId(),
            'provider_name' => $this->providerName,
        ]);
        $this->get(route('facebook.callback'));
        $this->assertSame(1, User::all()->count());
    }

    /**
     * @test
     */
    public function 未登録ユーザーが認証される(): void
    {
        $this->get(route('facebook.callback'));
        $user = User::first();
        $this->assertAuthenticatedAs($user);
    }

    /**
     * @test
     */
    public function 既存ユーザーでログインできる(): void
    {
        $user = factory(User::class)->create([
            'name' => $this->user->getName(),
            'email' => $this->user->getEmail(),
            'provider_id' => $this->user->getId(),
            'provider_name' => $this->providerName,
        ]);
        $this->get(route('facebook.callback'));
        $this->assertAuthenticatedAs($user);
    }
}
