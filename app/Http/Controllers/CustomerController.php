<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Http\Controllers\Controller;
use App\Models\invoice;
use App\Models\rule;
use App\Models\trainer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
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

             if($data!=null){
                 return $data;
             }

        }


        // return $monday;
        // continue
    }

    //Create Function of Customer
    public function create_data(Request $req)
    {
        $inv = new invoice();

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
            $db->image = $req->file('cfile')->store('customer_images');
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
        $db->advnace_allow = $req->avance_total;
        $db->advance_month = $req->advance_month;
        $db->discount = $req->discount;

        // invoice add

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
        if ($req->advnace_allow == 'yes') {
            $db->avance_total = $req->gymfee * $req->advance_month - $req->discount;
            $inv->amount = $req->gymfee * $req->advance_month - $req->discount;
            $inv->gym_fees = $req->gymfee * $req->advance_month - $req->discount;
            $inv->fee_amount = $req->gymfee * $req->advance_month - $req->discount;
        } else {
            $db->avance_total = 0;
            $inv->amount = $req->gymfee;
            $inv->gym_fees = $req->gymfee;
            $inv->fee_amount = $req->gymfee;
        }

        $db->mon_start_time = $req->mondaytimein;
        $db->mon_end_time = $req->mondaytimeout;
        $db->mon_allow_pt = $req->mondaypt;


        $db->tue_start_time = $req->tuesdaytimein;
        $db->tue_end_time = $req->tuesdaytimeout;
        $db->tue_allow_pt = $req->tuesdaypt;
        $db->wed_start_time = $req->wednesdaytimein;
        $db->wed_end_time = $req->wednesdaytimeout;
        $db->wed_allow_pt = $req->wednesdaypt;
        $db->thu_start_time = $req->thursdaytimein;
        $db->thu_end_time = $req->thursdaytimeout;
        $db->thu_allow_pt = $req->thursdaypt;
        $db->fri_start_time = $req->fridaytimein;
        $db->fri_end_time = $req->fridaytimeout;
        $db->fri_allow_pt = $req->fridaypt;
        $db->sat_start_time = $req->saturdaytimein;
        $db->sat_end_time = $req->saturdaytimeout;
        $db->sat_allow_pt = $req->saturdaypt;
        $db->sun_start_time = $req->sundaytimein;
        $db->sun_end_time = $req->sundaytimeout;
        $db->sun_allow_pt = $req->sundaypt;

        $count = 0;

        if ($req->mondaypt) {
            $count = $count + 1;
        }
        if ($req->tuesdaypt) {
            $count = $count + 1;
        }
        if ($req->wednesdaypt) {
            $count = $count + 1;
        }
        if ($req->thursdaypt) {
            $count = $count + 1;
        }
        if ($req->fridaypt) {
            $count = $count + 1;
        }
        if ($req->saturdaypt) {
            $count = $count + 1;
        }
        if ($req->sundaypt) {
            $count = $count + 1;
        }
        $result = $count * 4;
        $db->total_session = $result;


        $inv->trainer_fees = $req->trainfee * $result;
        $inv->net_total = ($req->trainfee * $result) + $req->gymfee + $req->regfee;
        if ($db->save()) {
            $inv->save();
            $req->session()->flash('customer', $data);
        } else {
            $req->session()->flash('error', $data);
        }
        return redirect('manage-customer');
    }

    
    // Add PT Details
    public function pt_trainer_details()
    {
        $db = new customer();
        $data = DB::select("SELECT * FROM customers where training_type = 'PT'");
        $page_title = 'Add Person Training Details';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('customer.addPtDetails', compact('page_title', 'page_description', 'action'), ['customers' => $data]);
    }


    // view Functions
    public function customer_view($id)
    {
        $page_title = 'View Customer Profile';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new customer();
        $data = $db::all()->find($id);
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

    public function customer_update_show($id)
    {
        $page_title = 'Customer Update';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new customer();
        $db_2 = new trainer();
        $data = $db::all()->find($id);
        $data_2 = $db_2::all();
        $data_3 = (DB::select("select * from rules where rules_token = 'ME_A1002'"));
        // dd($data_3);
        return view('customer.update', compact('page_title', 'page_description', 'action'), ['datas' => $data, 'trainers' => $data_2, 'rul' => $data_3]);
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
            $data->image = $req->file('cfile')->store('customer_images');
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
        $data->advnace_allow = $req->avance_total;
        $data->advance_month = $req->advance_month;
        $data->discount = $req->discount;
        // advance total calculation
        $count = '';
        if ($req->advnace_allow == "yes") {
            $count = $req->gymfee * $req->advance_month - $req->discount;
            $data->avance_total = $count;
        } else {
            $data->avance_total = 0;
        }
        $data->mon_start_time = $req->mondaytimein;
        $data->mon_end_time = $req->mondaytimeout;
        $data->mon_allow_pt = $req->mondaypt;
        $data->tue_start_time = $req->tuesdaytimein;
        $data->tue_end_time = $req->tuesdaytimeout;
        $data->tue_allow_pt = $req->tuesdaypt;
        $data->wed_start_time = $req->wednesdaytimein;
        $data->wed_end_time = $req->wednesdaytimeout;
        $data->wed_allow_pt = $req->wednesdaypt;
        $data->thu_start_time = $req->thursdaytimein;
        $data->thu_end_time = $req->thursdaytimeout;
        $data->thu_allow_pt = $req->thursdaypt;
        $data->fri_start_time = $req->fridaytimein;
        $data->fri_end_time = $req->fridaytimeout;
        $data->fri_allow_pt = $req->fridaypt;
        $data->sat_start_time = $req->saturdaytimein;
        $data->sat_end_time = $req->saturdaytimeout;
        $data->sat_allow_pt = $req->saturdaypt;
        $data->sun_start_time = $req->sundaytimein;
        $data->sun_end_time = $req->sundaytimeout;
        $data->sun_allow_pt = $req->sundaypt;


        $count = 0;

        if ($req->mondaypt) {
            $count = $count + 1;
        }
        if ($req->tuesdaypt) {
            $count = $count + 1;
        }
        if ($req->wednesdaypt) {
            $count = $count + 1;
        }
        if ($req->thursdaypt) {
            $count = $count + 1;
        }
        if ($req->fridaypt) {
            $count = $count + 1;
        }
        if ($req->saturdaypt) {
            $count = $count + 1;
        }
        if ($req->sundaypt) {
            $count = $count + 1;
        }
        $result = $count * 4;
        $data->total_session = $result;



        if ($data->save()) {
            return redirect('manage-customer');
        } else {
            return redirect('manage-customer');
        }
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
        $page_title = 'Add Fees';
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

        $data->save();
        $val->save();
        return redirect('manage-customer');
    }
}
