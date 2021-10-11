<?php

namespace App\Console\Commands;

use App\Models\rule;
use App\Models\trainer;
use App\Models\User;
use App\Notifications\reminderNotify;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class trainerSalary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:trainer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trainer Payslip Available';

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
        $data = DB::select('select * from rules where rules_token = "DP_A1001"');
        if($data){
          
                $date  = date('Y-m-d');
                $exp = explode("-", $date);
                $value = $exp[0]."-".$exp[1]."-".$data[0]->values;
                // echo $date;
                if($value == $date){
                    DB::select('UPDATE `trainers` SET `salary_status`="Unpaid"');
                    $dbUser = new User();
                    $user = $dbUser->all()->where('roles','=','admin');
                    $notify_msg = "Trainer Pay Slips for the month have been tallied. Please access the Trainer Pay Slip module to approve payouts.";
                    Notification::send($user, new reminderNotify($notify_msg));
                }
            
        }
    }
}
