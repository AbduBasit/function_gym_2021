<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use Mockery\Undefined;

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
        $db->image = $req->file('cfile')->store('customer_images');
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
}
