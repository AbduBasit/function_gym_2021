<?php

namespace App\Imports;

use App\Models\expense;
use Maatwebsite\Excel\Concerns\ToModel;

class ExpensesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new expense([
            //
        ]);
    }
}
