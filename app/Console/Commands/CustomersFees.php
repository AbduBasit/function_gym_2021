<?php

namespace App\Console\Commands;

use App\Mail\reminder;
use App\Models\customer;
use App\Models\User;
use App\Notifications\reminderNotify;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

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
        function sms($to, $message){
            $token = "a5483bc9d08c5e96f0a8b5d6aa93f610abdeaa6194";
            $secret = "saadUsmani112211122";
            $brand = "SMS Alert";
            $url = "https://lifetimesms.com/plain";
            $parameters = array("api_token" => $token,
                            "api_secret" => $secret,
                            "to" => $to,
                            "from" => $brand,
                            "message" => $message
                            );

            $ch = curl_init();
            $timeout  =  30;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            $response = curl_exec($ch);
            curl_close($ch);
            // echo $response;
        }
        $db = new customer();
        $dbUser = new User();
        $user = $dbUser->all()->where('roles','=','admin');
        $data = $db->all();
        $check = DB::select('select * from customers where trainer_name = "UA" and status = "active"');
        if($check!=null){
            $notify_msg = "Some clients currently have no trainers assigned to them. Go to the Manage Customers module to check.";
            Notification::send($user, new reminderNotify($notify_msg));
        }
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
                       
                        $notify_msg = "Some clients have become Unpaid becuase they has been completed a month and Invoices have been dispatched on Email, SMS alerts have been sent.";
                        Notification::send($user, new reminderNotify($notify_msg));
                        $message = "Dear ".$datas->first_name." ".$datas->last_name.", Your invoice of this month has been generated and sent to your E-mail.  – Function";
                        sms($datas->phone_number, $message);
                        $emailMsG = "We hope the past month at Function has moved you closer to your fitness goals. 
                        Your invoice for the month of (month name) has been generated. 
                        Due date is up to 10 days after invoicing.
                        ";
                        Mail::to($datas->email)->send(new reminder($datas, "Your Invoice of this Month | Function", $emailMsG));
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
                // echo $join . " ";
                if($date == date('Y-m-d')){
                    DB::select('UPDATE `customers` SET `fees_clear`= "Unpaid" where date_of_joining = "'.$join.'"');
                    $notify_msg = "Some clients have become Unpaid becuase they has been completed a month and Invoices have been dispatched on Email, SMS alerts have been sent.";
                    Notification::send($user, new reminderNotify($notify_msg));
                    $message = "Dear ".$datas->first_name." ".$datas->last_name.", Your invoice of this month has been generated and sent to your E-mail.  – Function";
                    sms($datas->phone_number, $message);
                    $emailMsG = "We hope the past month at Function has moved you closer to your fitness goals. 
                    Your invoice for the month of (month name) has been generated. 
                    Due date is up to 10 days after invoicing.
                    ";
                    Mail::to($datas->email)->send(new reminder($datas, "Your Invoice of this Month | Function", $emailMsG));
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
                    $join2 = $dates[0]."-".$dates[1]."-".$doj[2];
                    if($join2 == $date1){
                        $join = $doj[0]."-".$doj[1]."-".$dates[2];
                        DB::select('UPDATE `customers` SET `status`= "inactive" where renew_month_end = "'.$join.'"');  
                        $notify_msg = "Some clients have become Inactive for overdues beyond the 10-day grace period. Go to Manage Customers module.";
                        Notification::send($user, new reminderNotify($notify_msg));
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
                $join2 = $dates[0]."-".$dates[1]."-".$doj[2];
                if($join2 == $date1){
                    $join = $doj[0]."-".$doj[1]."-".$dates[2];
                    DB::select('UPDATE `customers` SET `status`= "inactive" where month_end = "'.$join.'"');  
                    $notify_msg = "Some clients have become Inactive for overdues beyond the 10-day grace period. Go to Manage Customers module.";
                    Notification::send($user, new reminderNotify($notify_msg));
                    
                }
               }
            }
        }

        
    }
}
