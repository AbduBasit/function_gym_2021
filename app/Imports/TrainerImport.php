<?php

namespace App\Imports;

use App\Models\trainer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class TrainerImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new trainer([
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'phone_number' => $row['phone_number'],
            'address' => $row['address'],
            'date_of_birth' => $row['date_of_birth'],
            'cnic' => $row['cnic'],
            'fixed_salary' => $row['fixed_salary'],
            'commision' => $row['commision'],
            'salary_status' => $row['salary_status'],
            'date_of_pay' => $row['date_of_pay'],
            'timing_in' => $row['timing_in'],
            'timing_out' => $row['timing_out'],
        ]);
    }
   
}
