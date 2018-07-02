<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountingInvoiceLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('cloudware-square')->create('accounting_invoice_lines', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('invoice_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->double('quantity')->nullable();
            $table->double('price')->nullable();
            $table->integer('tax')->unsigned();
            $table->foreign('invoice_id')->references('id')->on('accounting_invoices');
            
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
        Schema::connection('cloudware-square')->dropIfExists('accounting_invoice_lines');
    }
}
