<?php

namespace App\Imports;

use App\Models\customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new customer([
            'first_name' => $row['first_name'],
             'last_name' => $row['last_name'],
             'email' => $row['email'],
             'phone_number' => $row['phone_number'],
             'address' => $row['address'],
             'date_of_birth' => $row['date_of_birth'],
             'gender' => $row['gender'],
             'cnic' => $row['cnic'],
             'image' => $row['image'],
             'date_of_joining' => $row['date_of_joining'],
             'month_end' => $row['month_end'],
             'training_type' => $row['training_type'],
             'trainer_name' => $row['trainer_name'],
             'status' => $row['status'],
             'fees_clear' => $row['fees_clear'],
             'reference_name' => $row['reference_name'],
             'registration_fees' => $row['registration_fees'],
             'gym_fees' => $row['gym_fees'],
             'trainer_fees_per_session' => $row['trainer_fees_per_session'],
             'total_session' => $row['total_session'],
             'advnace_allow' => $row['advnace_allow'],
             'advance_month' => $row['advance_month'],
             'discount' => $row['discount'],
             'avance_total' => $row['avance_total'],
             'mon_start_time' => $row['mon_start_time'],
             'mon_end_time' => $row['mon_end_time'],
             'mon_allow_pt' => $row['mon_allow_pt'],
             'tue_start_time' => $row['tue_start_time'],
             'tue_end_time' => $row['tue_end_time'],
             'tue_allow_pt' => $row['tue_allow_pt'],
             'wed_start_time' => $row['wed_start_time'],
             'wed_end_time' => $row['wed_end_time'],
             'wed_allow_pt' => $row['wed_allow_pt'],
             'thu_start_time' => $row['thu_start_time'],
             'thu_end_time' => $row['thu_end_time'],
             'thu_allow_pt' => $row['thu_allow_pt'],
             'fri_start_time' => $row['fri_start_time'],
             'fri_end_time' => $row['fri_end_time'],
             'fri_allow_pt' => $row['fri_allow_pt'],
             'sat_start_time' => $row['sat_start_time'],
             'sat_end_time' => $row['sat_end_time'],
             'sat_allow_pt' => $row['sat_allow_pt'],
             'sun_start_time' => $row['sun_start_time'],
             'sun_end_time' => $row['sun_end_time'],
             'sun_allow_pt' => $row['sun_allow_pt']
        ]);
    }
}
