<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email');
            $table->string('trainer_name');
            $table->string('training_type');
            $table->string('note');
            $table->string('pay_date');
            $table->string('month_end');
            $table->string('fees_payable');
            $table->string('status');
            $table->string('payment_method');
            $table->integer('registration_fees');
            $table->integer('gym_fees');
            $table->integer('trainer_fees');
            $table->integer('gst');
            $table->integer('discount');
            $table->integer('net_total');

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
        Schema::dropIfExists('invoices');
    }
}
