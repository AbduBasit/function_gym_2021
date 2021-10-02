<?php

namespace App\Exports;

use App\Models\customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'first_name',
             'last_name',
             'email',
             'phone_number',
             'address',
             'date_of_birth',
             'gender',
             'cnic',
             'image',
             'current_activity_level',
             'daily_routine',
             'medical_condition',
             'medical_condition_description',
             'prev_injury',
             'previous_excersice',
             'daily_diet',
             'test1_core_activation',
             'test1_core_activation_description',
             'test2_core_activation',
             'test2_core_activation_description',
             'strength_core_activation',
             'strength_core_activation_description',
             'test_glute_activation',
             'test_glute_activation_description',
             'strength_glute_activation',
             'strength_glute_activation_description',
             'test_clamshells_activation',
             'test_clamshells_activation_description',
             'strength_clamshells_activation',
             'strength_clamshells_activation_description',
             'measurement_cal_unit',
             'chest',
             'waist',
             'hips',
             'weight_cal_unit',
             'body_weight',
             'body_fat',
             'muscles_mass',
             'squat_test_1',
             'squat_test_1_desc',
             'squat_test_2',
             'squat_test_2_desc',
             'squat_test_3',
             'squat_test_3_desc',
             'squat_test_4',
             'squat_test_4_desc',
             'squat_test_5',
             'squat_test_5_desc',
             'squat_test_6',
             'squat_test_6_desc',
             'squat_test_7',
             'squat_test_7_desc',
             'squat_test_8',
             'squat_test_8_desc',
             'squat_test_9',
             'squat_test_9_desc',
             'strength_squat_activation',
             'strength_squat_activation_description',
             'date_of_joining',
             'month_end',
             'renew_joining',
             'renew_month_end',
             'training_type',
             'trainer_name',
             'status',
             'fees_clear',
             'reference_name',
             'registration_fees',
             'gym_fees',
             'trainer_fees_per_session',
             'total_session',
             'advnace_allow',
             'advance_month',
             'discount',
             'avance_total',
             'mon_start_time',
             'mon_end_time',
             'mon_allow_pt',
             'tue_start_time',
             'tue_end_time',
             'tue_allow_pt',
             'wed_start_time',
             'wed_end_time',
             'wed_allow_pt',
             'thu_start_time',
             'thu_end_time',
             'thu_allow_pt',
             'fri_start_time',
             'fri_end_time',
             'fri_allow_pt',
             'sat_start_time',
             'sat_end_time',
             'sat_allow_pt',
             'sun_start_time',
             'sun_end_time',
             'sun_allow_pt'
        ];
    }
    public function collection()
    {
        return collect(customer::getCustomer());
    }
}
