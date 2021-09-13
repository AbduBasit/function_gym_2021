<?php

namespace App\Exports;

use App\Models\expense;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExpensesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'title',
            'desc',
            'amount',
            'quan',
            'disc',
            'tax',
            'net'
        ];
    }
    public function collection()
    {
        return collect(expense::getExpense());
    }
}
