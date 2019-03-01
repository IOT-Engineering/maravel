<?php

namespace App\Http\Middleware;

use App\Models\Module\Module;
use App\Events\AdminMenuCreated;
use App\User;
use Auth;
use Closure;
use Illuminate\Support\Facades\Log;
use Menu;
use Module as LaravelModule;

class AdminMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if logged in
        if (!Auth::check()) {
            return $next($request);
        }

        // Setup the admin menu
        Menu::create('AdminMenu', function ($menu)
        {
            $menu->style('adminlte');
            $user = Auth::user();

            $attr = ['icon' => 'fa fa-angle-double-right'];

            // Dashboard
            $menu->add([
                'url' => 'admin/home',
                'title' => 'Panel Principal',
                'icon' => 'fa fa-dashboard',
                'order' => 1,
            ]);

            
            // Items
            if($user->canView('admin/users') || $user->canView('admin/roles/create') || $user->canView('admin/roles') )
            {
                $menu->dropdown('Usuarios', function ($sub) use($user, $attr)
                {
                    if ($user->canView('admin/users') || $user->canView('admin/roles/create'))
                    {
    
                        $sub->dropdown('Gestión de Usuarios', function ($subSub) use ($user, $attr)
                        {
                            if ($user->canView('admin/users'))
                            {
                                $subSub->url('admin/users', 'Ver Usuarios', 1, ['icon' => 'fa fa-eye']);
                            }
        
                            if ($user->canView('admin/users/create'))
                            {
                                $subSub->url('admin/users/create', 'Añadir Usuario', 2, ['icon' => 'fa fa-plus']);
                            }
        
                        });
                    }
                    
                    if ($user->canView('admin/roles')) 
                    {
                        $sub->url('admin/roles', 'Roles y Permisos');
                    }

                }, 2, [
                    'title' => 'Usuarios',
                    'icon' => 'fa fa-users',
                ]);

            }

            // Fire the event to extend the menu
            event(new AdminMenuCreated($menu));
        });
    

        
        return $next($request);
    }
}