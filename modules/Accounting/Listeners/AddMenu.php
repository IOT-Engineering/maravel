<?php

namespace Modules\Accounting\Listeners;

use App\Events\AdminMenuCreated;
use Illuminate\Support\Facades\Log;
use Nwidart\Menus\Facades\Menu;

class AddMenu
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /**
     * Handle the event.
     *
     * @param AdminMenuCreated $event
     * @return void
     */
    public function handle($event)
    {
        Log::info("Module Admin Created");
        
        
        $event->menu->add([
            'url' => '/',
            'title' => 'Modulo',
            'icon' => 'fa fa-dashboard',
            'order' => 1,
        ]);

    }
}
