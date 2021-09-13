<?php

namespace App\Exports;

use App\Models\invoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class InvoicesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'customer_name',
            'customer_phone',
            'customer_email',
            'trainer_name',
            'training_type',
            'pay_date',
            'fees_payable',
            'amount',
            'payment_method',
            'registration_fees',
            'reference',
            'gym_fees',
            'fee_amount',
            'trainer_fees',
            'discount',
            'net_total',
        ];
    }
    public function collection()
    {
        return collect(invoice::getInvoice());
    }
}
