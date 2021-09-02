<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    public $fillable = [
        'exp_title',
        'exp_desc',
        'exp_amount',
        'exp_quan',
        'exp_disc',
        'exp_tax',
        'exp_net'
    ];
    use HasFactory;
}
