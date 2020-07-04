<?php


namespace App\Http\Adapters\OAuth\Facebook;


use App\User as UserModel;
use Crypto\OAuth\Facebook\UserPort;
use Crypto\OAuth\Facebook\ValueObject\User;
use Illuminate\Contracts\Auth\Authenticatable;

final class UserAdapter implements UserPort
{
    private ?User $_user = null;

    public function setUser(User $user): self
    {
        $this->_user = $user;
        return $this;
    }

    /**
     * @return User|null
     */
    public function user(): ?User
    {
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
        if ($userModel === null) {
            return false;
        }

        /** @var Authenticatable $userModel */
        auth()->login($userModel);

        return auth()->check();
    }
}
