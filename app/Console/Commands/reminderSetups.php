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

class reminderSetups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminder Alerts';

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
        $today = date('Y-m-d');
        if($data){
            foreach($data as $val => $datas){
                if($datas->renew_joining != null || $datas->renew_joining != ""){
                    if($datas->status = "active"){
                        $dojs = $datas->renew_joining;
                        $doj = explode("-", $dojs);
                        $date1 = date('Y-m-d', strtotime($today. "-3 days"));
                        $dates = explode("-", $date1);
                        $date = $dates[0]."-".$dates[1]."-".$doj[2];
                        $renew = $doj[0]."-".$doj[1]."-".$dates[2];
                        if($date == date('Y-m-d', strtotime($today. "-3 days")) && $datas->fees_clear == "Unpaid"){
                            $dbv = DB::select('select * from `customers` where renew_joining = "'.$renew.'"');
                            foreach($dbv as $dt){
                                $message = "Dear ".$dbv[$val]->first_name." ".$dbv[$val]->last_name.", \n\n This is a soft reminder to clear your monthly fee at your earliest convenience – Function";
                            sms($dbv[$val]->phone_number, $message);
                            $emailMsG = "\n\n We hope the past month at Function has moved you closer to your fitness goals.\n 
                                Your invoice for this month has been generated.\n\n 
                                Due date is up to 10 days after invoicing.\n
                                ";
                            Mail::to($dbv[$val]->email)->send(new reminder($dbv[$val], "1st Reminder for Payment", $emailMsG)); 
                            }
                            $customer_name =  $datas->first_name ." ". $datas->last_name;
                            $notify_msg = "First Reminder Email and SMS has been Sent to ".$customer_name;
                            Notification::send($user, new reminderNotify($notify_msg));
                        }
                    }
                }
                else if($datas->date_of_joining != null || $datas->date_of_joining != ""){
                   if($datas->status = "active"){
                    $dojs = $datas->date_of_joining;
                    $doj = explode("-", $dojs);
                    $date1 = date('Y-m-d', strtotime($today. "-3 days"));
                    $dates = explode("-", $date1);
                    $date = $dates[0]."-".$dates[1]."-".$doj[2];
                    $join = $doj[0]."-".$doj[1]."-".$dates[2];
                    if($date == date('Y-m-d', strtotime($today. "-3 days")) && $datas->fees_clear == "Unpaid"){
                        $dbv = DB::select('select * from `customers` where date_of_joining = "'.$join.'"');
                        foreach($dbv as $dt){
                            $message = "Dear ".$dt->first_name." ".$dt->last_name.", \n\n This is a soft reminder to clear your monthly fee at your earliest convenience – Function";
                        sms($dt->phone_number, $message);
                        $emailMsG = "\n\n We hope the past month at Function has moved you closer to your fitness goals.\n 
                            Your invoice for this month has been generated.\n\n 
                            Due date is up to 10 days after invoicing.\n
                            ";
                        Mail::to($dt->email)->send(new reminder($dt, "1st Reminder for Payment", $emailMsG)); 
                        }
                        $customer_name =  $datas->first_name ." ". $datas->last_name;
                        $notify_msg = "First Reminder Email and SMS has been Sent to ".$customer_name;
                        Notification::send($user, new reminderNotify($notify_msg));
                    }
                   }
                }


                if($datas->renew_joining != null || $datas->renew_joining != ""){
                    if($datas->status == "active" && $datas->fees_clear == "Unpaid"){
                        $dojs = $datas->renew_joining;
                        $doj = explode("-", $dojs);
                        $date1 = date('Y-m-d', strtotime($today. "-2 days"));
                        $dates = explode("-", $date1);
                        $date = $dates[0]."-".$dates[1]."-".$doj[2];
                        $renew = $doj[0]."-".$doj[1]."-".$dates[2];
                        if($date == date('Y-m-d', strtotime($today. "-2 days")) && $datas->fees_clear == "Unpaid"){
                            $dbv = DB::select('select * from `customers` where renew_joining = "'.$renew.'"');
                            foreach($dbv as $dt){
                                $message = "Dear ".$dt->first_name." ".$dt->last_name.", \n\n This is a soft reminder to clear your monthly fee – Function";
                                sms($dt->phone_number, $message);
                                $emailMsG = "\n\n This is a soft reminder to clear your pending dues.\n 
                                If this is an error and you have already made the payment, please let us know by responding to this email or in person.\n
                                ";
                                
                                Mail::to($dt->email)->send(new reminder($dbv[$val], "2nd Reminder for Payment", $emailMsG)); 
                            }
                            $customer_name =  $datas->first_name ." ". $datas->last_name;
                            $notify_msg = "Second Reminder Email and SMS has been Sent to ".$customer_name;
                            Notification::send($user, new reminderNotify($notify_msg));
                        }
                    }
                }
                else if($datas->date_of_joining != null || $datas->date_of_joining != ""){
                   if($datas->status == "active" && $datas->fees_clear == "Unpaid"){
                    $dojs = $datas->date_of_joining;
                    $doj = explode("-", $dojs);
                    $date1 = date('Y-m-d', strtotime($today. "-6 days"));
                    $dates = explode("-", $date1);
                    $date = $dates[0]."-".$dates[1]."-".$doj[2];
                    $join = $doj[0]."-".$doj[1]."-".$dates[2];
                    // echo $date . " ";
                    if($date == date('Y-m-d', strtotime($today. "-6 days")) && $datas->fees_clear == "Unpaid"){
                        $dbv = DB::select('select * from `customers` where date_of_joining = "'.$join.'"');
                        foreach($dbv as $dt){
                            $message = "Dear ".$dt->first_name." ".$dt->last_name.", \n\n This is a soft reminder to clear your monthly fee – Function";
                            sms($dt->phone_number, $message);
                            $emailMsG = "\n\n This is a soft reminder to clear your pending dues.\n 
                            If this is an error and you have already made the payment, please let us know by responding to this email or in person.\n
                            ";
                            
                            Mail::to($dt->email)->send(new reminder($dbv[$val], "2nd Reminder for Payment", $emailMsG)); 
                        }
                        $customer_name =  $datas->first_name ." ". $datas->last_name;
                        $notify_msg = "Second Reminder Email and SMS has been Sent to ".$customer_name;
                        Notification::send($user, new reminderNotify($notify_msg));
                     
                    }
                   }
                }

            }
            
        }
    }
}
