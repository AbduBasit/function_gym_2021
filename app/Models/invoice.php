<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class invoice extends Model
{
    protected $fillable = [
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

    use HasFactory;

  
    public static function getInvoice(){
        $records = DB::select('select `customer_name`, `customer_phone`, `customer_email`, `trainer_name`, `training_type`, `pay_date`, `fees_payable`, `amount`, `payment_method`, `registration_fees`, `reference`, `gym_fees`, `fee_amount`, `trainer_fees`, `discount`, `net_total` from invoices');
        return $records;
    }
}
