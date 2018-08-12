<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDashboardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dashboard', function(Blueprint $table)
        {
            $table->dropUnique('function');
            $table->unique(['user_id','controller', 'function']);
        });
    
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dashboard', function(Blueprint $table)
        {
            $table->dropUnique(['controller_function']);
            $table->unique('controller', 'function');
        });
    }
}
