<?php

namespace Modules\Accounting\Providers;

use App\Events\AdminMenuCreated;
use App\Events\BlockCreated;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Accounting\Listeners\AddBlock;
use Modules\Accounting\Listeners\AddMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
         AdminMenuCreated::class => [
             AddMenu::class
        ],
        BlockCreated::class => [
            AddBlock::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        
    }
}
