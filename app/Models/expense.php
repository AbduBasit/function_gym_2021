<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class expense extends Model
{
    public $fillable = [
        'title',
        'desc',
        'amount',
        'quan',
        'disc',
        'tax',
        'net'
    ];
    use HasFactory;
    public static function getExpense(){
        $records = DB::select('select 
        `title`,
        `desc`,
        `amount`,
        `quan`,
        `disc`,
        `tax`,
        `net`
        from expenses');
        return $records;
    }
}
