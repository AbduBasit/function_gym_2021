<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Http\Controllers\Controller;
use App\Models\trainer;

class CustomerController extends Controller
{
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
        $db->cnic = $req->cnic;
        // Image Section
        if ($req->file('cfile')) {
            $db->image = $req->file('cfile')->store('customer_images');
        }
        $db->current_activity_level = $req->activity;
        $db->daily_routine = $req->dailyroutine;
        $db->medical_condition = $req->medicon;
        $db->medical_condition_description = $req->injury;
        $db->previous_excersice = $req->preexcersice;
        $db->daily_diet = $req->dailydiet;
        $db->test1_core_activation = $req->tva1;
        $db->test1_core_activation_description = $req->tva_1_com;
        $db->test2_core_activation = $req->tva2;
        $db->test2_core_activation_description = $req->tva_2_com;
        $db->strength_core_activation = $req->absstrength;
        $db->strength_core_activation_description = $req->weakcore;
        $db->test_glute_activation = $req->glute;
        $db->test_glute_activation_description = $req->glute_com;
        $db->strength_glute_activation = $req->glutestrength;
        $db->strength_glute_activation_description = $req->glutecore;
        $db->test_clamshells_activation = $req->clamshell;
        $db->test_clamshells_activation_description = $req->clamshell_com;
        $db->strength_clamshells_activation = $req->clamshellstrength;
        $db->strength_clamshells_activation_description = $req->clamshellcore;
        $db->measurement_cal_unit = $req->mcal;
        $db->chest = $req->chest;
        $db->waist = $req->waist;
        $db->hips = $req->hips;
        $db->weight_cal_unit = $req->weight_unit;
        $db->body_weight = $req->weight;
        $db->body_fat = $req->fat;
        $db->muscles_mass = $req->muscles;
        $db->squat_test_1 = $req->sc1;
        $db->squat_test_1_desc = $req->sc1_desc;
        $db->squat_test_2 = $req->sc2;
        $db->squat_test_2_desc = $req->sc2_desc;
        $db->squat_test_3 = $req->sc3;
        $db->squat_test_3_desc = $req->sc3_desc;
        $db->squat_test_4 = $req->sc4;
        $db->squat_test_4_desc = $req->sc4_desc;
        $db->squat_test_5 = $req->sc5;
        $db->squat_test_5_desc = $req->sc5_desc;
        $db->squat_test_6 = $req->sc6;
        $db->squat_test_6_desc = $req->sc6_desc;
        $db->squat_test_7 = $req->sc7;
        $db->squat_test_7_desc = $req->sc7_desc;
        $db->squat_test_8 = $req->sc8;
        $db->squat_test_8_desc = $req->sc8_desc;
        $db->squat_test_9 = $req->sc9;
        $db->squat_test_9_desc = $req->sc9_desc;
        $db->strength_squat_activation = $req->squatstrength;
        $db->strength_squat_activation_description = $req->squatcore;
        $db->date_of_joining = $req->doj;
        $db->month_end = $req->mde;
        $db->training_type = $req->ttype;
        $db->trainer_name = $req->tname;
        $db->status = $req->status;
        $db->reference_name = $req->reference;
        $db->registration_fees = $req->regfee;
        $db->gym_fees = $req->gymfee;
        $db->trainer_fees_per_session = $req->trainfee;
        $db->total_session = $req->tsession;
        $db->allow_discount = $req->discounttoggle;
        $db->discount_category = $req->dcat;
        $db->discount_type = $req->dtype;
        $db->discount_fixed_amount = $req->percent;
        $db->discount_percent_amount = $req->fixed;
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
        if ($db->save()) {
            $req->session()->flash('customer', $data);
        } else {
            $req->session()->flash('error', $data);
        }
        return redirect('create-customer');
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
        $page_title = 'View Customer Profile';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new customer();
        $db_2 = new trainer();
        $data = $db::all()->find($id);
        $data_2 = $db::all();
        return view('customer.update', compact('page_title', 'page_description', 'action'), ['datas' => $data, 'trainers' => $data_2,]);
    }
    public function customer_update(Request $req)
    {
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
        $data->date_of_joining = $req->doj;
        $data->month_end = $req->mde;
        $data->training_type = $req->ttype;
        $data->trainer_name = $req->tname;
        $data->status = $req->status;
        $data->reference_name = $req->reference;
        $data->registration_fees = $req->regfee;
        $data->gym_fees = $req->gymfee;
        $data->trainer_fees_per_session = $req->trainfee;
        $data->total_session = $req->tsession;
        $data->allow_discount = $req->discounttoggle;
        $data->discount_category = $req->dcat;
        $data->discount_type = $req->dtype;
        $data->discount_fixed_amount = $req->percent;
        $data->discount_percent_amount = $req->fixed;
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
        if ($data->save()) {
            return redirect('manage-customer');
        } else {
            return redirect('manage-customer');
        }
    }
}
