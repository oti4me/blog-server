<?php

namespace App\Providers;

use App\models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

use Exception;
use \Firebase\JWT\JWT;
use App\Helpers\AuthHelpers;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->viaRequest('api', function ($request) {
            $userToken = $request->header('Authorization');
            
            if(!$userToken) {
                return null;
            }

            $decodeToken = AuthHelpers::jwtDecode($userToken);

            if ($decodeToken) {
                if($user = User::find($decodeToken->sub)) {
                    return $user;
                } 
            }

            return null;
        });
    }
}
