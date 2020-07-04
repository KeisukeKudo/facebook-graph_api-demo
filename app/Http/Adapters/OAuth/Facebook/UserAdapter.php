<?php


namespace App\Http\Adapters\OAuth\Facebook;


use Crypto\OAuth\Facebook\UserPort;
use Crypto\OAuth\Facebook\ValueObject\ProviderId;
use Crypto\OAuth\Facebook\ValueObject\ProviderName;
use Crypto\OAuth\Facebook\ValueObject\User;
use Crypto\OAuth\Facebook\ValueObject\UserEmail;
use Crypto\OAuth\Facebook\ValueObject\UserName;
use App\User as UserModel;

class UserAdapter implements UserPort
{
    private ?User $_user = null;

    /**
     * @param User|null $user
     * @return User|null
     */
    public function user(User $user = null): ?User
    {
        if ($user !== null) {
            $this->_user = $user;
        }

        return $this->_user ?? null;
    }

    public function exists(): bool
    {
        if ($this->_user === null) {
            return false;
        }

        $email = ($this->_user->getValue())['email'];

        $user = UserModel::where('email', $email->getValue())
            ->first();
        return $user !== null;
    }

    public function store(): bool
    {
        if ($this->_user === null) {
            return false;
        }

        $user = $this->_user->getValue();
        $userModel = new UserModel([
            'name' => $user['name']->getValue(),
            'email' => $user['email']->getValue(),
            'provider_id' => $user['provider_id']->getValue(),
            'provider_name' => $user['provider_name']->getValue(),
        ]);

        return $userModel->save();
    }

    public function auth(): bool
    {
        if ($this->_user === null) {
            return false;
        }

        $user = $this->_user->getValue();
        $userModel =
            UserModel::where('email', $user['email']->getValue())
                ->first();
        if ($userModel === null || !$userModel->exists()) {
            return false;
        }

        auth()->login($userModel);

        return auth()->check();
    }

    public function newUser(User $user): UserPort
    {
        $self = new $this;
        $self->user($user);

        return $self;
    }
}
