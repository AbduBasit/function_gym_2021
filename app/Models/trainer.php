<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class trainer extends Model
{

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'date_of_birth',
        'cnic',
        'fixed_salary',
        'commision',
        'salary_status',
        'date_of_pay',
        'timing_in',
        'timing_out',
    ];

    use HasFactory;

    public static function getTrainer(){
        $trainer_record = DB::select('select
            first_name,
            last_name,
            email,
            phone_number,
            address,
            date_of_birth,
            cnic,
            fixed_salary,
            commision,
            salary_status,
            date_of_pay,
            timing_in,
            timing_out
             from trainers'
        );
        return $trainer_record;
    }
}
