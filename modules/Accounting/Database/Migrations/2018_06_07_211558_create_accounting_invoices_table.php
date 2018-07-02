<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountingInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('cloudware-square')->create('accounting_invoices', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('invoice_number')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_nif')->nullable();
            $table->string('company_address')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_nif')->nullable();
            $table->string('client_country')->nullable();
            $table->string('client_city')->nullable();
            $table->string('client_cp')->nullable();
            $table->string('client_address')->nullable();
            $table->date('date')->nullable();
            $table->date('due_date')->nullable();
            
            $table->boolean('draft')->default(1);
            $table->boolean('send')->default(0);
            $table->double('paid_percent')->default(0);
            
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('accounting_categories');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('cloudware-square')->dropIfExists('accounting_invoices');
    }
}
