<?php

namespace Modules\Accounting\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Accounting\Http\Controllers\CategoriesController;

class AddBlock
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $component = $event->block->get('maravel-dashboard');

        $component->add(CategoriesController::class, 'testHTMLInjection', 'Gráfica de Ventas', 'Visualiza el importe total de cada mes acumulado');
    }
}
