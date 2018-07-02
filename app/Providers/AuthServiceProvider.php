<?php

namespace App\Providers;

use App\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('maravel-auth', function($user, $route)
        {
            $role    = $user->role;

            $allow = false;

            // Check if User is admin
            if($role->name != "admin")
            {
                // Get Http Request parameters
                $route = explode(' ', $route);
                $method = $route[0];
                $url = $route[1];

                $url_paths = explode('/', $url);
                $url_prefix = $url_paths[0];

                // Check if the route is public
                if ($url_prefix == 'admin')
                {
                    foreach ($role->permissions as $permission)
                    {
                        if (fnmatch(strtolower($permission->url), strtolower($url)) && strtoupper($permission->method) == strtoupper($method))
                        {
                            if ($permission->allow == true)
                            {
                                $allow = true;
                            }

                            break;
                        }
                    }
                }
                else
                {
                    // Allow public routes
                    $allow = true;
                }
            }
            else
            {
                // Allow admin rol
                $allow = true;
            }

            return $allow;
        });
    }
}
