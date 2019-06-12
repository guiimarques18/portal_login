<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
// use Illuminate\Support\Facades\Gate;
// use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Contracts\Auth\UserProvider;
// use Illuminate\Contracts\Auth\Authenticatable;

class CustomEloquentUserProvider extends EloquentUserProvider
{
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'];
        exit("VC11");
        if ($user->legacy) {
            return hash_equals(md5($plain), $user->getAuthPassword());
        }

        return parent::validateCredentials($user, $credentials);
    }

}
