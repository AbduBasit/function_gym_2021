<?php

namespace App\Console\Commands;

use App\Models\customer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CustomersFees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:customers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monthly Fees of Customers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $db = new customer();
        $data = $db->all();
        foreach($data as $datas){
            if($datas->renew_joining){
                if($datas->status = "active"){
                    $dojs = $datas->renew_joining;
                    $doj = explode("-", $dojs);
                    $date1 = date('Y-m-d');
                    $dates = explode("-", $date1);
                    $date = $dates[0]."-".$dates[1]."-".$doj[2];
                    $renew = $doj[0]."-".$doj[1]."-".$dates[2];
                    if($date == date('Y-m-d')){
                        DB::select('UPDATE `customers` SET `fees_clear`= "Unpaid" where renew_joining = "'.$renew.'"');
                    }
                }
            }
            else if($datas->date_of_joining){
               if($datas->status = "active"){
                $dojs = $datas->date_of_joining;
                $doj = explode("-", $dojs);
                $date1 = date('Y-m-d');
                $dates = explode("-", $date1);
                $date = $dates[0]."-".$dates[1]."-".$doj[2];
                $join = $doj[0]."-".$doj[1]."-".$dates[2];
                if($date == date('Y-m-d')){
                    DB::select('UPDATE `customers` SET `fees_clear`= "Unpaid" where date_of_joining = "'.$join.'"');
                }
               }
            }
           else{
               
           }

            // month end
            if($datas->renew_month_end){
                if($datas->status = "active" && $datas->fees_clear == "Unpaid"){
                    $dojs = $datas->renew_month_end;
                    $doj = explode("-", $dojs);
                    $new = date('Y-m-d');
                    $date1 = date('Y-m-d', strtotime($new . "-1 day"));
                    $dates = explode("-", $date1);
                    $date = $dates[0]."-".$dates[1]."-".$doj[2];
                    $join = $doj[0]."-".$doj[1]."-".$dates[2];
                    if($join == $date1){
                        DB::select('UPDATE `customers` SET `status`= "inactive" where renew_month_end = "'.$join.'"');  
                    }
                   }
            }
            else if($datas->month_end){
               if($datas->status = "active" && $datas->fees_clear == "Unpaid"){
                $dojs = $datas->month_end;
                $doj = explode("-", $dojs);
                $new = date('Y-m-d');
                $date1 = date('Y-m-d', strtotime($new . "-1 day"));
                $dates = explode("-", $date1);
                $date = $dates[0]."-".$dates[1]."-".$doj[2];
                $join = $doj[0]."-".$doj[1]."-".$dates[2];
                if($join == $date1){
                    DB::select('UPDATE `customers` SET `status`= "inactive" where month_end = "'.$join.'"');  
                }
               }
            }
        }

        
    }
}
