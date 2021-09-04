<?php

namespace App\Http\Controllers;

use App\Models\rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActivityController extends Controller
{
    public function rules_index()
    {
        $page_title = 'Manage Rules';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;

        $db = new rule();
        $data = $db->all();
        return view('activity.manageRules', compact('page_title', 'page_description', 'action'), ['datas' => $data]);
    }


    public function update_rule_show($id)
    {
        $page_title = 'Update Rules';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;

        $db = new rule();
        $data = $db->all()->find($id);
        return view('activity.updateRules', compact('page_title', 'page_description', 'action'), ['datas' => $data]);
    }

    public function update_rule(Request $req)
    {
        $db = new rule();
        $data = $db->all()->find($req->id);
        $data->rules = $req->rules;
        $data->description = $req->description;
        $data->values = $req->values;

        if ($data->save()) {
            $message = 'Data Updated Successfully';
        } else {
            $error = 'Something went wrong';
        }
        return redirect('manage-rules');
    }

    public function email_index(){
        $page_title = 'Compose Your Mail';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('activity.compose', compact('page_title', 'page_description', 'action'));
    }
    public function email_send(Request $req){
        
        

        $to = $req->post('to')[0];
        $subject = $req->post('subject')[0];
        $msg = $req->post('message')[0];
        $user['to'] = $to;
        $data = $subject;
        Mail::send($msg, $data, function ($message) use ($user){
            $message->to($user['to']);
        });

        // why add view in parameter

        return 'ssss';
        
    }

}
