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
            $table->string('training_type')->nullable();
            $table->string('pay_date')->nullable();
            $table->string('fees_payable')->nullable();
            $table->integer('amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('registration_fees')->nullable();
            $table->integer('gym_fees')->nullable();
            $table->integer('fee_amount')->nullable();
            $table->integer('trainer_fees')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('net_total')->nullable();

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
