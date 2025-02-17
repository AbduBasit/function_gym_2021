<?php

namespace App\Http\Controllers;

use App\Exports\CustomerExport;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Http\Controllers\Controller;
use App\Imports\CustomerImport;
use App\Mail\InvoiceMail;
use App\Mail\monthlyMailInv;
use App\Models\invoice;
use App\Models\rule;
use App\Models\trainer;
use Illuminate\Support\Facades\DB;
use Excel;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
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
    public function index_customer(Request $req)
    {
        
        $page_title = 'Manage Customers';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        // $db = new customer();
        // if($req->post()){
        //     $in = $req->post('t_in');
        //     $out = $req->post('t_out');
        //     $data = DB::select("SELECT * FROM customers WHERE date_of_joining BETWEEN '$in' and '$out'");
        //     if($data){
        //         $target = $data;
        //         return $target;
        //     }
        // }
        // else{
        //     $data = $db::all();
        //     $target= $data;
           
        // }
        //dd($action);
        return view('customer.manage', compact('page_title', 'page_description', 'action'));
    }

    public function manage_data(Request $req){
        $data = null;
        //$db = new customer();

        if($req->post()){
           if($req->post('t_in') && $req->post('t_out')){
            $in = $req->post('t_in');
            $out = $req->post('t_out');
            $data = DB::select("SELECT * FROM customers WHERE date_of_joining BETWEEN '$in' and '$out'");
            //$data = DB::select("SELECT * FROM customers WHERE status = 'active'");
            //dd($data);
            if($data){
                $target = $data;
                return $target;
            }
           }
           

        if($req->post('filter_fees')){
            // return $req->post('filter_fees');
            $filter_value = $req->post('filter_fees');
            $data = DB::select("SELECT * FROM customers WHERE fees_clear = '$filter_value'");
            if($data){
                $target = $data;
                return $target;
            }
        }

        
     
        }
        else{
            // $data = DB::table('customers')->join('trainers','trainers.id','=','customers.trainer_name')
            // ->select('customers.*','trainers.first_name as trainer_first_name','trainers.last_name as trainer_last_name')
            // ->get();
            $data = DB::select("SELECT customers.* , trainers.first_name AS 'trainer_name', trainers.last_name AS 'trainer_last_name' from customers LEFT JOIN trainers ON customers.trainer_name = trainers.id
                    ORDER by customers.id DESC");
            $target= $data;
            return $target;
        }
    }

    
    public function export_customer($value){
        if($value=='customer_xlsx'){
            return Excel::download(new CustomerExport, 'customers_list.xlsx');
            return redirect('manage-customer');
        }
        elseif($value=='customer_csv'){
            return Excel::download(new CustomerExport, 'customers_list.csv');
            return redirect('manage-customer');
        }
        else{
            return 'Error';
        }
    }

    public function import_customer(Request $req){

        // dd($req->file('file_trainer'));
        Excel::import(new CustomerImport, $req->file('file_trainer'));
        return redirect('manage-trainer');
    }


    // Trainer_Check
    public function trainer_check(Request $req){
        
        $monday = $req->post('monday') ;
        $tuesday = $req->post('tuesday');
        $wednesday = $req->post('wednesday');
        $thursday = $req->post('thursday');
        $friday = $req->post('friday');
        $saturday = $req->post('saturday');
        $sunday = $req->post('sunday');
        $monday_m = $req->post('monday_m') ;
        $tuesday_m = $req->post('tuesday_m');
        $wednesday_m = $req->post('wednesday_m');
        $thursday_m = $req->post('thursday_m');
        $friday_m = $req->post('friday_m');
        $saturday_m = $req->post('saturday_m');
        $sunday_m = $req->post('sunday_m');



        if($monday!=null || $tuesday!=null || $wednesday!=null || $thursday!=null|| $friday!=null|| $saturday!=null|| $sunday!=null){
            $data = DB::select('SELECT 
            count(trainer_name) as total_customer,
            count(mon_start_time) as mon_start,
            count(tue_start_time) as tue_start,
            count(wed_start_time) as wed_start,
            count(thu_start_time) as thu_start,
            count(fri_start_time) as fri_start,
            count(sat_start_time) as sat_start,
            count(sun_start_time) as sun_start,
            trainer_name FROM `customers` where
             mon_start_time like "'.$monday.'%'.$monday_m.'" or 
             tue_start_time like "'.$tuesday.'%'.$tuesday_m.'" or
             wed_start_time like "'.$wednesday.'%'.$wednesday_m.'" or  
             thu_start_time like "'.$thursday.'%'.$thursday_m.'" or
             fri_start_time like "'.$friday.'%'.$friday_m.'" or
             sat_start_time like "'.$saturday.'%'.$saturday_m.'" or
             sun_start_time like "'.$sunday.'%'.$sunday_m.'"
             GROUP by 
             trainer_name
             ');

            // foreach($data as $key=> $value){
                $trainer = DB::select('SELECT concat(first_name, " " , last_name) as trainer_name FROM `trainers`');
            //     return $trainer[$key];
            // }
             if($data!=null){
                return [$data, $trainer];
             }
             else{return 0;}

        }


        // return $monday;
        // continue
    }

    public function check_sunday(Request $req){
        if($req->day == 7){
             $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE sun_allow_pt = "yes" AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
            return response()->json(['trainers'=> $count]);

        }
    }

    public function check_saturday(Request $req)
    {
        if ($req->day == 6) {
            $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE sat_allow_pt = "yes" AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
            return response()->json(['trainers' => $count]);
        }
    }

    public function check_friday(Request $req)
    {
        if ($req->day == 5) {
            $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE fri_allow_pt = "yes" AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
            return response()->json(['trainers' => $count]);
        }
    }

    public function check_thursday(Request $req)
    {
        if ($req->day == 4) {
            $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE thu_allow_pt = "yes" AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
            return response()->json(['trainers' => $count]);
        }
    }

    public function check_wednesday(Request $req)
    {
        if ($req->day == 3) {
            $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE wed_allow_pt = "yes" AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
            return response()->json(['trainers' => $count]);
        }
    }

    public function check_tuesday(Request $req)
    {
        if ($req->day == 2) {
            $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE tue_allow_pt = "yes" AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
            return response()->json(['trainers' => $count]);
        }
    }

    public function check_monday(Request $req)
    {
        if ($req->day == 1) {
            $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE mon_allow_pt = "yes" AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
            return response()->json(['trainers' => $count]);
        }
    }

    

    public function check_sunday_time(Request $req)
    {
        if ($req->day == 7) {
            $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE CAST(sun_start_time as time) BETWEEN "'.$req->time_in.'" AND "'.$req->time_out. '"  AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
                                    return response()->json(['trainers' => $count]);
        }
    }

    

    public function check_saturday_time(Request $req)
    {
        if ($req->day == 6) {
            $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE sat_start_time BETWEEN "' . $req->time_in . '" AND "' . $req->time_out . '" AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
            return response()->json(['trainers' => $count]);
        }
    }

    public function check_friday_time(Request $req)
    {
        if ($req->day == 5) {
            $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE CAST(fri_start_time as time) BETWEEN "' . $req->time_in . '" AND "' . $req->time_out . '"  AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
            return response()->json(['trainers' => $count]);
        }
    }

    public function check_thursday_time(Request $req)
    {
        if ($req->day == 4) {
            $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE CAST(thu_start_time as time) BETWEEN "'.$req->time_in.'" AND "'.$req->time_out.'"  AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
            return response()->json(['trainers' => $count]);
        }
    }

    public function check_wednesday_time(Request $req)
    {
        if ($req->day == 3) {
            $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE CAST(wed_start_time as time) BETWEEN "' . $req->time_in . '" AND "' . $req->time_out . '"  AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
            return response()->json(['trainers' => $count]);
        }
    }

    public function check_tuesday_time(Request $req)
    {
        if ($req->day == 2) {
            $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE CAST(tue_start_time as time) BETWEEN "' . $req->time_in . '" AND "' . $req->time_out . '"  AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
            return response()->json(['trainers' => $count]);
        }
    }

    public function check_monday_time(Request $req)
    {
        if ($req->day == 1) {
            $count = DB::select(' select id, first_name, last_name, 
                                    (SELECT COUNT(trainer_name) FROM `customers` WHERE CAST(mon_start_time as time) BETWEEN "' . $req->time_in . '" AND "' . $req->time_out . '"  AND trainer_name = trainers.id
                                    GROUP BY (trainer_name)) as Count from trainers');
            return response()->json(['trainers' => $count]);
        }
    }

    public function trainer_check_3(Request $req){
        $mon_sm = explode(":", $req->mondaytimein);
        $tue_sm = explode(":", $req->tuesdaytimein);
        $wed_sm = explode(":", $req->wednesdaytimein);
        $thu_sm = explode(":", $req->thursdaytimein);
        $fri_sm = explode(":", $req->fridaytimein);
        $sat_sm = explode(":", $req->saturdaytimein);
        $sun_sm = explode(":", $req->sundaytimein);

        $tue_m = null;
        $wed_m = null;
        $thu_m = null;
        $fri_m = null;
        $sat_m = null;
        $sun_m = null;
            if($mon_sm[0]!=null){
                $mon_m = implode($mon_sm)[4] .implode($mon_sm)[5];
            }
            if($tue_sm[0]!=null){
                $tue_m = implode($tue_sm)[4] .implode($tue_sm)[5];
            }
            if($wed_sm[0]!=null){
                $wed_m = implode($wed_sm)[4] .implode($wed_sm)[5];
            }
            if($thu_sm[0]!=null){
                $thu_m = implode($tue_sm)[4] .implode($tue_sm)[5];
            }
            if($fri_sm[0]!=null){
                $fri_m = implode($tue_sm)[4] .implode($tue_sm)[5];
            }
            if($sat_sm[0]!=null){
                $sat_m = implode($tue_sm)[4] .implode($tue_sm)[5];
            }
            if($sun_sm[0]!=null){
                $sun_m = implode($sun_sm)[4] .implode($sun_sm)[5];
            }


        
        
        $mon = $mon_sm[0];
         $tue = $tue_sm[0];
         $wed = $wed_sm[0];
         $thu = $thu_sm[0];
         $fri = $fri_sm[0];
         $sat = $sat_sm[0];
         $sun = $sun_sm[0];

         if($mon==3||$tue==3||$wed==3||$thu==3||$fri==3||$sat==3||$sun==3){
            $data = DB::select('SELECT 
            count(trainer_name) as total_customer,
            count(mon_start_time) as mon_start,
            count(tue_start_time) as tue_start,
            count(wed_start_time) as wed_start,
            count(thu_start_time) as thu_start,
            count(fri_start_time) as fri_start,
            count(sat_start_time) as sat_start,
            count(sun_start_time) as sun_start,
            trainer_name FROM `customers` where
             mon_start_time like "'.$mon.'%'.$mon_m.'" or 
             tue_start_time like "'.$tue.'%'.$tue_m.'" or
             wed_start_time like "'.$wed.'%'.$wed_m.'" or  
             thu_start_time like "'.$thu.'%'.$thu_m.'" or
             fri_start_time like "'.$fri.'%'.$fri_m.'" or
             sat_start_time like "'.$sat.'%'.$sat_m.'" or
             sun_start_time like "'.$sun.'%'.$sun_m.'"
             GROUP by 
           trainer_name
             ');

              
             foreach($data as $item => $value){

                $n = DB::select('select concat(first_name, " ", last_name) as traine_name from trainers where not  concat(first_name, " ", last_name) = "'.$data[$item]->trainer_name.'"');
                return $n;
             }

             

          
         }
    }

    //Create Function of Customer
    public function create_data(Request $req)
    {
        

        $data = "";
        $db = new customer();
        $db->first_name = $req->firstName;
        $db->last_name = $req->lastName;
        $db->email = $req->email;
        $db->phone_number = $req->phoneNumber;
        $db->address = $req->place;
        $db->date_of_birth = $req->dob;
        $db->gender = $req->gender;
        $db->cnic = $req->cnic;
        // Image Section
        if ($req->file('cfile')) {
            $image_original = $req->file('cfile');
            $extension = $image_original->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $image_original->move('upload/customer_images/', $fileName);
            $db->image = $fileName;
        }
        $db->date_of_joining = $req->doj;
        // date_end function
        $data = DB::select("select * from rules where rules_token = 'ME_A1002'");
        if ($req->doj) {
            $Date2 = date('Y-m-d', strtotime($req->doj . "+ 1 month + " . $data[0]->values . " day"));
            $db->month_end = $Date2;
        } else {
            $db->month_end = "No Date";
        }

        $db->training_type = $req->ttype;
        $db->trainer_name = $req->tname;
        $db->status = $req->status;
        $db->fees_clear = $req->fees_status;
        $db->reference_name = $req->reference;
        $db->registration_fees = $req->regfee;
        $db->gym_fees = $req->gymfee;
        $db->trainer_fees_per_session = $req->trainfee;
        //$db->advnace_allow = $req->avance_total;
        $db->advance_month = $req->advance_month;
        $db->discount = $req->discount;

        // invoice add
        $inv = new invoice();
        $name = $req->firstName . ' ' . $req->lastName;
        $inv->customer_name = $name;
        $inv->customer_email = $req->email;
        $inv->customer_phone = $req->phoneNumber;
        $inv->trainer_name = $req->tname;
        $inv->training_type = $req->ttype;
        $inv->pay_date = $req->doj;
        $inv->fees_payable = $req->fees_status;
        $inv->payment_method = 'Cash';
        $inv->registration_fees = $req->regfee;
        $inv->reference = $req->reference;




        // advance total calculation
        if ($req->advnace_allow == 1) {
            $db->advnace_allow = "yes";
            //$db->avance_total = $req->gymfee * $req->advance_month - $req->discount;
            $discount_amount = ($req->discount/100)*$req->avance_total;
            $db->discount = $req->discount;
            $db->avance_total = $req->avance_total;
            //$inv->amount = $req->gymfee * $req->advance_month - $req->discount;
            $inv->amount = $req->avance_total;
            $inv->gym_fees = $req->avance_total- $discount_amount;
            $inv->fee_amount = $req->avance_total;
        } else {
            $db->avance_total = 0;
            $inv->amount = $req->total_payment;
            $inv->gym_fees = $req->gymfee;
            $inv->fee_amount = $req->regfee;
        }

        foreach($req->days as $day){
            if($day == 'monday'){
                $db->mon_start_time = $req->mondaytimein;
                $db->mon_end_time = $req->mondaytimeout;
                $db->mon_allow_pt = 'yes';
            }
            if($day == 'tuesday'){
                $db->tue_start_time = $req->tuesdaytimein;
                $db->tue_end_time = $req->tuesdaytimeout;
                $db->tue_allow_pt = 'yes';
            }
            if ($day == 'wednesday') {
                $db->wed_start_time = $req->wednesdaytimein;
                $db->wed_end_time = $req->wednesdaytimeout;
                $db->wed_allow_pt = 'yes';
            }
            if ($day == 'thursday') {
                $db->thu_start_time = $req->thursdaytimein;
                $db->thu_end_time = $req->thursdaytimeout;
                $db->thu_allow_pt = 'yes';
            }
            if ($day == 'friday') {
                $db->fri_start_time = $req->fridaytimein;
                $db->fri_end_time = $req->fridaytimeout;
                $db->fri_allow_pt = 'yes';
            }
            if ($day == 'saturday') {
                $db->sat_start_time = $req->saturdaytimein;
                $db->sat_end_time = $req->saturdaytimeout;
                $db->sat_allow_pt = 'yes';
            }
            if ($day == 'sunday') {
                $db->sun_start_time = $req->sundaytimein;
                $db->sun_end_time = $req->sundaytimeout;
                $db->sun_allow_pt = 'yes';
            }
            
        }
        $db->total_session = $req->tsession;



        
        
        
        

        // $count = 0;

        // if ($req->mondaypt) {
        //     $count = $count + 1;
        // }
        // if ($req->tuesdaypt) {
        //     $count = $count + 1;
        // }
        // if ($req->wednesdaypt) {
        //     $count = $count + 1;
        // }
        // if ($req->thursdaypt) {
        //     $count = $count + 1;
        // }
        // if ($req->fridaypt) {
        //     $count = $count + 1;
        // }
        // if ($req->saturdaypt) {
        //     $count = $count + 1;
        // }
        // if ($req->sundaypt) {
        //     $count = $count + 1;
        // }
        // $result = $count * 4;
        


        $inv->trainer_fees = $req->trainfee * $req->tsession;

        //$net_total =($req->trainfee * $result) + $req->gymfee + $req->regfee;
        $inv->net_total = $req->total_payment - $req->regfee;


        
        if ($db->save()) {
            $inv->save();

            
        if($req->email){
            $data = $req->all();
            if($req->fees_status == "All Clear"){
                Mail::to($req->email)->send(new InvoiceMail([$data, $req->total_payment]));
            }
        }  
        if($req->phone_number){
            $message = "Dear ".$req->firstName." ".$req->lastName.", Thank you for signing up with Function. You will receive a confirmation E-mail with your registration invoice soon.";
            $this->sms($req->phone_number, $message);
        } 
        }
        return redirect('manage-customer');
    }

    
    // Add PT Details
    public function pt_trainer_details()
    {
        $db = new customer();
        $data = DB::select("SELECT id FROM customers where training_type = 'PT' and not daily_routine and not daily_diet and not prev_injury and not strength_core_activation and not strength_glute_activation and not strength_squat_activation");
        if($data){
            $data2 = DB::select('Select * from customers where NOT id='.$data[0]->id.'');
        }
        else{
            $data2 = DB::select('Select * from customers');
        }
        $page_title = 'Add Person Training Details';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('customer.addPtDetails', compact('page_title', 'page_description', 'action'), ['customers' => $data2]);
    }


    // view Functions
    public function customer_view($id)
    {
        $page_title = 'View Customer Profile';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new customer();
        $data = $db::all()->find($id);
        //dd($data);
        return view('customer.view', compact('page_title', 'page_description', 'action'), ['datas' => $data]);
    }

    // Delete Function
    public function customer_delete($id)
    {
        $db = new customer();
        $data = $db::all()->find($id);
        $data->delete();
        return redirect('manage-customer');
    }

    public function status_change_customer(Request $req){
        $random = explode('-', $req->post('val'));
        $id=$random[1];
        $value=$random[0];
        if($req->post()){
            if($value == "active"){
                $db = new customer();
                $data = $db->all()->find($id);
                $data->status = $value;
                if($data->save()){
                    return 1;    
                }
                else{
                    return 'error';
                }
            }
        }
        
    }

    public function customer_update_show($id)
    {
        $page_title = 'Customer Update';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        //$db = new customer();
        $db_2 = new trainer();
        //$data = $db::all()->find($id);
        // $data = DB::table('customers')
        // ->where('customers.id','=',$id)
        // ->join('trainers', 'trainers.id','=', 'customers.trainer_name')
        // ->select('customers.*','trainers.first_name as trainer_first_name', 'trainers.last_name as trainer_last_name')
        // ->first();
        $data = DB::select("SELECT customers.* , trainers.first_name AS 'trainer_first_name', trainers.last_name AS 'trainer_last_name' from customers LEFT JOIN trainers ON customers.trainer_name = trainers.id
        WHERE customers.id = '".$id."'
        ORDER by customers.id DESC");
        //dd($data[0]);
        $data_2 = $db_2::all();
        $data_3 = (DB::select("select * from rules where rules_token = 'ME_A1002'"));
        // dd($data_3);
        return view('customer.update', compact('page_title', 'page_description', 'action'), ['datas' => $data[0], 'trainers' => $data_2, 'rul' => $data_3]);
    }
    public function customer_update(Request $req)
    {
        $data_3 = (DB::select("select * from rules where rules_token = 'ME_A1002'"));
        $db = new customer();
        $data = $db::all()->find($req->id);
        $data->first_name = $req->firstName;
        $data->last_name = $req->lastName;
        $data->email = $req->email;
        $data->phone_number = $req->phoneNumber;
        $data->address = $req->place;
        $data->date_of_birth = $req->dob;
        $data->cnic = $req->cnic;
        // Image Section
        if ($req->file('cfile')) {
            $image_original = $req->file('cfile');
            $extension = $image_original->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $image_original->move('upload/customer_images/', $fileName);
            $data->image = $fileName;
        }
        $data->date_of_joining = $req->doj;
        // date_end function
        if ($req->doj) {
            $Date2 = date('Y-m-d', strtotime($req->doj . "+ 1 month + " . $data_3[0]->values . " day"));
            $data->month_end = $Date2;
        } else {
            $data->month_end = "No Date";
        }

        $data->training_type = $req->ttype;
        $data->trainer_name = $req->tname;
        $data->status = $req->status;
        $data->fees_clear = $req->fees_status;
        $data->reference_name = $req->reference;
        $data->registration_fees = $req->regfee;
        $data->gym_fees = $req->gymfee;
        $data->trainer_fees_per_session = $req->trainfee;
        $data->total_session = $req->tsession;
        //$data->advnace_allow = $req->avance_total;
        
        // advance total calculation
        $count = '';
        if ($req->advnace_allow == "1") {
            //$count = $req->gymfee * $req->advance_month - $req->discount;
            $data->advnace_allow = "1";
            $data->avance_total = $req->avance_total;
            $data->advance_month = $req->advance_month;
            $data->discount = $req->discount;
        } else {
            $data->avance_total = 0;
        }
        // dd($req);
        foreach ($req->days as $day) {
            if ($day == 'monday') {
                $data->mon_start_time = $req->mondaytimein;
                $data->mon_end_time = $req->mondaytimeout;
                $data->mon_allow_pt = 'yes';
            }
            if ($day == 'tuesday') {
                $data->tue_start_time = $req->tuesdaytimein;
                $data->tue_end_time = $req->tuesdaytimeout;
                $data->tue_allow_pt = 'yes';
            }
            if ($day == 'wednesday') {
                $data->wed_start_time = $req->wednesdaytimein;
                $data->wed_end_time = $req->wednesdaytimeout;
                $data->wed_allow_pt = 'yes';
            }
            if ($day == 'thursday') {
                $data->thu_start_time = $req->thursdaytimein;
                $data->thu_end_time = $req->thursdaytimeout;
                $data->thu_allow_pt = 'yes';
            }
            if ($day == 'friday') {
                $data->fri_start_time = $req->fridaytimein;
                $data->fri_end_time = $req->fridaytimeout;
                $data->fri_allow_pt = 'yes';
            }
            if ($day == 'saturday') {
                $data->sat_start_time = $req->saturdaytimein;
                $data->sat_end_time = $req->saturdaytimeout;
                $data->sat_allow_pt = 'yes';
            }
            if ($day == 'sunday') {
                $data->sun_start_time = $req->sundaytimein;
                $data->sun_end_time = $req->sundaytimeout;
                $data->sun_allow_pt = 'yes';
            }
        }
        // $data->mon_start_time = $req->mondaytimein;
        // $data->mon_end_time = $req->mondaytimeout;
        // $data->mon_allow_pt = $req->mondaypt;
        // $data->tue_start_time = $req->tuesdaytimein;
        // $data->tue_end_time = $req->tuesdaytimeout;
        // $data->tue_allow_pt = $req->tuesdaypt;
        // $data->wed_start_time = $req->wednesdaytimein;
        // $data->wed_end_time = $req->wednesdaytimeout;
        // $data->wed_allow_pt = $req->wednesdaypt;
        // $data->thu_start_time = $req->thursdaytimein;
        // $data->thu_end_time = $req->thursdaytimeout;
        // $data->thu_allow_pt = $req->thursdaypt;
        // $data->fri_start_time = $req->fridaytimein;
        // $data->fri_end_time = $req->fridaytimeout;
        // $data->fri_allow_pt = $req->fridaypt;
        // $data->sat_start_time = $req->saturdaytimein;
        // $data->sat_end_time = $req->saturdaytimeout;
        // $data->sat_allow_pt = $req->saturdaypt;
        // $data->sun_start_time = $req->sundaytimein;
        // $data->sun_end_time = $req->sundaytimeout;
        // $data->sun_allow_pt = $req->sundaypt;


        // $count = 0;

        // if ($req->mondaypt) {
        //     $count = $count + 1;
        // }
        // if ($req->tuesdaypt) {
        //     $count = $count + 1;
        // }
        // if ($req->wednesdaypt) {
        //     $count = $count + 1;
        // }
        // if ($req->thursdaypt) {
        //     $count = $count + 1;
        // }
        // if ($req->fridaypt) {
        //     $count = $count + 1;
        // }
        // if ($req->saturdaypt) {
        //     $count = $count + 1;
        // }
        // if ($req->sundaypt) {
        //     $count = $count + 1;
        // }
        // $result = $count * 4;
        $data->total_session = $req->tsession;

        if ($data->save()) {
            return back();
        } else {
            return back();
        }

        // if ($data->save()) {
        //     return redirect('manage-customer');
        // } else {
        //     return redirect('manage-customer');
        // }
    }
    public function customer_update_pt($id)
    {
        $page_title = 'Update PT Details';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new customer();
        $data = $db::all()->find($id);
        return view('customer.update-pt', compact('page_title', 'page_description', 'action'), ['datas' => $data]);
    }

    public function add_pt_details(Request $req)
    {
        $db = new customer();
        $data = $db::all()->find($req->customer_id);
        $data->current_activity_level = $req->activity;
        $data->daily_routine = $req->dailyroutine;
        $data->medical_condition = $req->medicon;
        $data->medical_condition_description = $req->injury;
        $data->prev_injury = $req->prev_injury;
        $data->previous_excersice = $req->preexcersice;
        $data->daily_diet = $req->dailydiet;
        $data->test1_core_activation = $req->tva1;
        $data->test1_core_activation_description = $req->tva_1_com;
        $data->test2_core_activation = $req->tva2;
        $data->test2_core_activation_description = $req->tva_2_com;
        $data->strength_core_activation = $req->absstrength;
        $data->strength_core_activation_description = $req->weakcore;
        $data->test_glute_activation = $req->glute;
        $data->test_glute_activation_description = $req->glute_com;
        $data->strength_glute_activation = $req->glutestrength;
        $data->strength_glute_activation_description = $req->glutecore;
        $data->test_clamshells_activation = $req->clamshell;
        $data->test_clamshells_activation_description = $req->clamshell_com;
        $data->strength_clamshells_activation = $req->clamshellstrength;
        $data->strength_clamshells_activation_description = $req->clamshellcore;
        $data->measurement_cal_unit = $req->mcal;
        $data->chest = $req->chest;
        $data->waist = $req->waist;
        $data->hips = $req->hips;
        $data->weight_cal_unit = $req->weight_unit;
        $data->body_weight = $req->weight;
        $data->body_fat = $req->fat;
        $data->muscles_mass = $req->muscles;
        $data->squat_test_1 = $req->sc1;
        $data->squat_test_1_desc = $req->sc1_desc;
        $data->squat_test_2 = $req->sc2;
        $data->squat_test_2_desc = $req->sc2_desc;
        $data->squat_test_3 = $req->sc3;
        $data->squat_test_3_desc = $req->sc3_desc;
        $data->squat_test_4 = $req->sc4;
        $data->squat_test_4_desc = $req->sc4_desc;
        $data->squat_test_5 = $req->sc5;
        $data->squat_test_5_desc = $req->sc5_desc;
        $data->squat_test_6 = $req->sc6;
        $data->squat_test_6_desc = $req->sc6_desc;
        $data->squat_test_7 = $req->sc7;
        $data->squat_test_7_desc = $req->sc7_desc;
        $data->squat_test_8 = $req->sc8;
        $data->squat_test_8_desc = $req->sc8_desc;
        $data->squat_test_9 = $req->sc9;
        $data->squat_test_9_desc = $req->sc9_desc;
        $data->strength_squat_activation = $req->squatstrength;
        $data->strength_squat_activation_description = $req->squatcore;

        if ($data->save()) {
            return redirect('manage-customer');
        } else {
            return redirect('manage-customer');
        }
    }

    public function update_pt(Request $req)
    {
        $db = new customer();
        $data = $db::all()->find($req->id);
        $data->current_activity_level = $req->activity;
        $data->daily_routine = $req->dailyroutine;
        $data->medical_condition = $req->medicon;
        $data->medical_condition_description = $req->injury;
        $data->prev_injury = $req->prev_injury;
        $data->previous_excersice = $req->preexcersice;
        $data->daily_diet = $req->dailydiet;
        $data->test1_core_activation = $req->tva1;
        $data->test1_core_activation_description = $req->tva_1_com;
        $data->test2_core_activation = $req->tva2;
        $data->test2_core_activation_description = $req->tva_2_com;
        $data->strength_core_activation = $req->absstrength;
        $data->strength_core_activation_description = $req->weakcore;
        $data->test_glute_activation = $req->glute;
        $data->test_glute_activation_description = $req->glute_com;
        $data->strength_glute_activation = $req->glutestrength;
        $data->strength_glute_activation_description = $req->glutecore;
        $data->test_clamshells_activation = $req->clamshell;
        $data->test_clamshells_activation_description = $req->clamshell_com;
        $data->strength_clamshells_activation = $req->clamshellstrength;
        $data->strength_clamshells_activation_description = $req->clamshellcore;
        $data->measurement_cal_unit = $req->mcal;
        $data->chest = $req->chest;
        $data->waist = $req->waist;
        $data->hips = $req->hips;
        $data->weight_cal_unit = $req->weight_unit;
        $data->body_weight = $req->weight;
        $data->body_fat = $req->fat;
        $data->muscles_mass = $req->muscles;
        $data->squat_test_1 = $req->sc1;
        $data->squat_test_1_desc = $req->sc1_desc;
        $data->squat_test_2 = $req->sc2;
        $data->squat_test_2_desc = $req->sc2_desc;
        $data->squat_test_3 = $req->sc3;
        $data->squat_test_3_desc = $req->sc3_desc;
        $data->squat_test_4 = $req->sc4;
        $data->squat_test_4_desc = $req->sc4_desc;
        $data->squat_test_5 = $req->sc5;
        $data->squat_test_5_desc = $req->sc5_desc;
        $data->squat_test_6 = $req->sc6;
        $data->squat_test_6_desc = $req->sc6_desc;
        $data->squat_test_7 = $req->sc7;
        $data->squat_test_7_desc = $req->sc7_desc;
        $data->squat_test_8 = $req->sc8;
        $data->squat_test_8_desc = $req->sc8_desc;
        $data->squat_test_9 = $req->sc9;
        $data->squat_test_9_desc = $req->sc9_desc;
        $data->strength_squat_activation = $req->squatstrength;
        $data->strength_squat_activation_description = $req->squatcore;
        if ($data->save()) {
            return redirect('manage-customer');
        } else {
            return redirect('manage-customer');
        }
    }



    public function index_fees_add($id)
    {
        $page_title = 'Invoice';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new customer();
        $data = $db->all()->find($id);
        return view('customer.addFees', compact('page_title', 'page_description', 'action'), ['value' => $data]);
    }


    public function insertFees(Request $req, $id)
    {
        $db = new customer();
        $data = $db->all()->find($id);
        $data->fees_clear = $req->fees_status;
        $data->renew_joining = $req->doj_new;
        // $data->renew_month_end = $req->renew_month_end;

        $data1 = DB::select("select * from rules where rules_token = 'ME_A1002'");
        if ($req->doj_new) {
            $Date2 = date('Y-m-d', strtotime($req->doj_new . "+ 1 month + " . $data1[0]->values . " day"));
            $data->renew_month_end = $Date2;
        } else {
            $db->month_end = null;
        }
        $val = new invoice();
        $val->customer_name = $data->first_name . " " . $data->last_name;
        $val->customer_phone = $data->phone_number;
        $val->customer_email = $data->email;
        $val->trainer_name = $data->trainer_name;
        $val->training_type = $data->training_type;
        $val->pay_date = $req->pay_date;
        $val->training_type = $data->training_type;
        $val->fees_payable = $req->fees_status;
        $val->payment_method = $req->payment_type;
        $val->fee_amount = $req->amount;
        $val->discount = $req->discount;
        $val->net_total = $req->amount - $req->discount;
        // dd($value);
        if($data->save() &&  $val->save()){
        $value = [
            'name' => $data->first_name . " " . $data->last_name,
            'net_amount' => $req->amount - $req->discount,
            'phone' => $data->phone_number,
            'pay_date' => $req->pay_date,
            'email' => $data->email,
            'fees' => $req->fees_status,
        ];
            if($req->fees_status == "All Clear"){
                Mail::to($data->email)->send(new monthlyMailInv($value)); 
            }
        }
        else{
            dd('error');
        }
        return redirect('manage-customer');
    }
}
