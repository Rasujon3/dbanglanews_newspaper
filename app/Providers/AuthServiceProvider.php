<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use DB;
use Auth;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('category', function($user) {
           if(checkAuthorizarion($user->id)->category == 1)
           {
              return $user->role_id = checkAuthorizarion($user->id)->role_id;
           }
           
        });


        Gate::define('subcategory', function($user) {
           if(checkAuthorizarion($user->id)->subcategory == 1)
           {
              return $user->role_id = checkAuthorizarion($user->id)->role_id;
           }
           
        });

        Gate::define('news', function($user) {
           if(checkAuthorizarion($user->id)->news == 1)
           {
              return $user->role_id = checkAuthorizarion($user->id)->role_id;
           }
           
        });
        

        Gate::define('role', function($user) {
           if(checkAuthorizarion($user->id)->get_role == 1)
           {
              return $user->role_id = checkAuthorizarion($user->id)->role_id;
           }
           
        });


        Gate::define('user', function($user) {
           if(checkAuthorizarion($user->id)->user == 1)
           {
              return $user->role_id = checkAuthorizarion($user->id)->role_id;
           }
           
        });

    }
}
