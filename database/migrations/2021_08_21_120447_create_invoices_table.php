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
            $table->string('trainer_name')->nullable();
            $table->string('training_type');
            $table->string('pay_date');
            $table->string('fees_payable');
            $table->integer('amount');
            $table->string('payment_method');
            $table->integer('registration_fees')->nullable();
            $table->integer('gym_fees')->nullable();
            $table->integer('trainer_fees')->nullable();
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
