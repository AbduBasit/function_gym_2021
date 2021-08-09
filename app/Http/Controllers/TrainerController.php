<?php

namespace App\Http\Controllers;

use App\Models\trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    //Move to Page
    public function create_data()
    {
        $page_title = 'Add Trainer';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;

        return view('trainer.createnew', compact('page_title', 'page_description', 'action'));
    }
    public function create_new_trainer(Request $req)
    {
        $db = new trainer();
        $db->first_name = $req->firstName;
        $db->last_name = $req->lastName;
        $db->email = $req->email;
        $db->phone_number = $req->phoneNumber;
        $db->address = $req->place;
        $db->date_of_birth = $req->dob;
        $db->cnic = $req->cnic;
        $db->fixed_salary = $req->fixed_salary;
        $db->commision = $req->commision;
        $db->timing_in = $req->tin;
        $db->timing_out = $req->tout;
        // Image Section
        if ($req->file('cfile')) {
            $db->image = $req->file('tfile')->store('Trainer_images');
        }
        if ($db->save()) {
            return redirect('dashboard');
        }
    }
}
