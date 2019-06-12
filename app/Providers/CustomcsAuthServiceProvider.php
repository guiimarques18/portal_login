<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomcsAuthServiceProvider extends AuthServiceProvider //UserProvider
{

    private $model;

    public function __construct(\App\User $userModel)
    {
        exit("_C");
        $this->model = $userModel;
    }

    public function retrieveByCredentials(array $credentials)
    {
        exit("customRC");
        if (empty($credentials)) {
            return;
        }

        $user = $this->model->fetchUserByCredentials(['username' => $credentials['username']]);

        return $user;
    }

    public function validateCredentials(Authenticatable $user, Array $credentials)
    {
        exit("CustomVC");
        return ($credentials['username'] == $user->getAuthIdentifier() &&
        md5($credentials['password']) == $user->getAuthPassword());
    }

}
