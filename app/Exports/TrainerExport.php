<?php

namespace App\Exports;

use App\Models\trainer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrainerExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return [
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
    }
    public function collection()
    {
        return collect(trainer::getTrainer());
    }
}
