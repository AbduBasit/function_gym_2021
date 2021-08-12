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
        if ($req->file('tfile')) {
            $db->image = $req->file('tfile')->store('trainers_images');
        }
        if ($db->save()) {
            return redirect('manage-trainer');
        }
    }
    // Show Table 
    public function trainer_manage()
    {
        $page_title = 'Manage Trainers';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new trainer();
        $data = $db::all();
        return view('trainer.manage', compact('page_title', 'page_description', 'action'), ['datas' => $data]);
    }

    public function trainer_view($id)
    {
        $page_title = 'View Customer Profile';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new trainer();
        $data = $db::all()->find($id);
        return view('trainer.view', compact('page_title', 'page_description', 'action'), ['datas' => $data]);
    }

    // Delete Function
    public function trainer_delete($id)
    {
        $db = new trainer();
        $data = $db::all()->find($id);
        $data->delete();
        return redirect('manage-trainer');
    }

    // Update view Function
    public function update_trainer($id)
    {
        $page_title = 'Update Trainer';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new trainer();
        $data = $db::all()->find($id);
        return view('trainer.update', compact('page_title', 'page_description', 'action'), ['datas'=>$data]);
    }
    // Function Update
    public function update(Request $req)
    {
        $db = new trainer();
        $data = $db::all()->find($req->id);
        $data->first_name = $req->firstName;
        $data->last_name = $req->lastName;
        $data->email = $req->email;
        $data->phone_number = $req->phoneNumber;
        $data->address = $req->place;
        $data->date_of_birth = $req->dob;
        $data->cnic = $req->cnic;
        $data->fixed_salary = $req->fixed_salary;
        $data->commision = $req->commision;
        $data->timing_in = $req->tin;
        $data->timing_out = $req->tout;
        // Image Section
        if ($req->file('tfile')) {
            $data->image = $req->file('tfile')->store('trainers_images');
        }
        if ($data->save()) {
            return redirect('manage-trainer');
        } else {
            return redirect('manage-trainer');
        }
    }

    public function schedule_manage($id){
        $db = new trainer();
        $data = $db::all()->find($id);
        $name = $data->first_name . ' '. $db->first_name;
        $page_title = 'Trainers Schedule';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('trainer.schedule', compact('page_title', 'page_description', 'action'), ['trainer_name'=> $name]);
    }
}
