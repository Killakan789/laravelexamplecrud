<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('PON');
            $table->char('supplier');
            $table->integer('product')->unsigned();
            $table->integer('quantity');
            $table->char('payment_status');
            $table->date('order_date');
            $table->date('eta_date');
            $table->date('pickup_date');
            $table->integer('freight_forwarded')->unsigned();
            $table->string('destination');
            $table->date('etd_date');
            $table->date('delivery_date');
            $table->char('status');
            $table->timestamps();
        });

        Schema::table('mains', function($table) {
            $table->foreign('product')->references('id')->on('products');
            $table->foreign('freight_forwarded')->references('id')->on('counteragents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mains');
    }
}
