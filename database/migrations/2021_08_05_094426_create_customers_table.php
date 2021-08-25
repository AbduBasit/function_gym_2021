<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {

            // Personal Information
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('cnic')->nullable();
            $table->string('image')->nullable();

            // General Information
            $table->string('current_activity_level')->nullable();
            $table->string('daily_routine')->nullable();
            $table->string('medical_condition')->nullable();
            $table->string('medical_condition_description')->nullable();
            $table->string('previous_excersice')->nullable();
            $table->string('daily_diet')->nullable();

            // Initial Assessment
            // Core Activation
            $table->text('test1_core_activation')->nullable();
            $table->text('test1_core_activation_description')->nullable();
            $table->text('test2_core_activation')->nullable();
            $table->text('test2_core_activation_description')->nullable();
            $table->text('strength_core_activation')->nullable();
            $table->text('strength_core_activation_description')->nullable();

            // Glute Activation
            $table->text('test_glute_activation')->nullable();
            $table->text('test_glute_activation_description')->nullable();
            $table->text('strength_glute_activation')->nullable();
            $table->text('strength_glute_activation_description')->nullable();

            // Clamshells Activation
            $table->text('test_clamshells_activation')->nullable();
            $table->text('test_clamshells_activation_description')->nullable();
            $table->text('strength_clamshells_activation')->nullable();
            $table->text('strength_clamshells_activation_description')->nullable();

            // Measurement & Body Statistics
            $table->string('measurement_cal_unit')->nullable();
            $table->string('chest')->nullable();
            $table->string('waist')->nullable();
            $table->string('hips')->nullable();
            $table->string('weight_cal_unit')->nullable();
            $table->string('body_weight')->nullable();
            $table->string('body_fat')->nullable();
            $table->string('muscles_mass')->nullable();

            // Squat
            $table->text('squat_test_1')->nullable();
            $table->text('squat_test_1_desc')->nullable();
            $table->text('squat_test_2')->nullable();
            $table->text('squat_test_2_desc')->nullable();
            $table->text('squat_test_3')->nullable();
            $table->text('squat_test_3_desc')->nullable();
            $table->text('squat_test_4')->nullable();
            $table->text('squat_test_4_desc')->nullable();
            $table->text('squat_test_5')->nullable();
            $table->text('squat_test_5_desc')->nullable();
            $table->text('squat_test_6')->nullable();
            $table->text('squat_test_6_desc')->nullable();
            $table->text('squat_test_7')->nullable();
            $table->text('squat_test_7_desc')->nullable();
            $table->text('squat_test_8')->nullable();
            $table->text('squat_test_8_desc')->nullable();
            $table->text('squat_test_9')->nullable();
            $table->text('squat_test_9_desc')->nullable();
            $table->text('strength_squat_activation')->nullable();
            $table->text('strength_squat_activation_description')->nullable();

            // Accounts
            $table->string('date_of_joining')->nullable();
            $table->string('month_end')->nullable();
            $table->string('training_type')->nullable();
            $table->string('trainer_name')->nullable();
            $table->string('status')->nullable();
            $table->string('fees_clear')->nullable();
            $table->string('reference_name')->nullable();
            $table->string('registration_fees')->nullable();
            $table->string('gym_fees')->nullable();
            $table->string('trainer_fees_per_session')->nullable();
            $table->string('total_session')->nullable();
            $table->string('advnace_allow')->nullable();
            $table->string('advance_month')->nullable();
            $table->string('discount')->nullable();
            $table->string('avance_total')->nullable();

            // Timeschedule
            $table->string('mon_start_time')->nullable();
            $table->string('mon_end_time')->nullable();
            $table->string('mon_allow_pt')->nullable();
            $table->string('tue_start_time')->nullable();
            $table->string('tue_end_time')->nullable();
            $table->string('tue_allow_pt')->nullable();
            $table->string('wed_start_time')->nullable();
            $table->string('wed_end_time')->nullable();
            $table->string('wed_allow_pt')->nullable();
            $table->string('thu_start_time')->nullable();
            $table->string('thu_end_time')->nullable();
            $table->string('thu_allow_pt')->nullable();
            $table->string('fri_start_time')->nullable();
            $table->string('fri_end_time')->nullable();
            $table->string('fri_allow_pt')->nullable();
            $table->string('sat_start_time')->nullable();
            $table->string('sat_end_time')->nullable();
            $table->string('sat_allow_pt')->nullable();
            $table->string('sun_start_time')->nullable();
            $table->string('sun_end_time')->nullable();
            $table->string('sun_allow_pt')->nullable();

            // Timestamp
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
        Schema::dropIfExists('customers');
    }
}
