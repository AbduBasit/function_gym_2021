<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class customer extends Model
{
    protected $fillable = [
        'first_name',
         'last_name',
         'email',
         'phone_number',
         'address',
         'date_of_birth',
         'gender',
         'cnic',
         'image',
         'date_of_joining',
         'month_end',
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
         'sun_allow_pt',
    ];

    use HasFactory;

  
    public static function getCustomer(){
        $records = DB::select('select `first_name`, `last_name`, `email`, `phone_number`, `address`, `date_of_birth`, `gender`, `cnic`, `image`, `date_of_joining`, `month_end`, `training_type`, `trainer_name`, `status`, `fees_clear`, `reference_name`, `registration_fees`, `gym_fees`, `trainer_fees_per_session`, `total_session`, `advnace_allow`, `advance_month`, `discount`, `avance_total`, `mon_start_time`, `mon_end_time`, `mon_allow_pt`, `tue_start_time`, `tue_end_time`, `tue_allow_pt`, `wed_start_time`, `wed_end_time`, `wed_allow_pt`, `thu_start_time`, `thu_end_time`, `thu_allow_pt`, `fri_start_time`, `fri_end_time`, `fri_allow_pt`, `sat_start_time`, `sat_end_time`, `sat_allow_pt`, `sun_start_time`, `sun_end_time`, `sun_allow_pt` from customers');
        return $records;
    }
}
