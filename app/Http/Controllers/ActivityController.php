<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\rule;
use App\Mail\MassMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function email_index()
    {
        $page_title = 'Compose Your Mail';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;

        $customer = DB::select('select email from customers');
        $user = DB::select('select email from users');
        $trainer = DB::select('select email from trainers');

        return view('activity.compose', compact('page_title', 'page_description', 'action'), ['data' => $customer, 'user'=>$user, 'trainer'=>$trainer]);
    }
    public function email_send(Request $req)
    {



        $to = $req->post('emails');
        $subject = $req->post('values')['subject'][0];
        $msg = $req->post('values')['message'][0];
        // $user['to'] = $to;
        // $data = [
        //     'name' => 'Ghazanfar',
        //     'data' => $subject,
        // ];
        // Mail::send('activity.view', $data, function ($message) use ($user) {
        //     $message->to($user['to']);
        // });
        $details = [
            'title' => 'Email By Function',
            'body' => $msg,
            'subject' => $subject
        ];

        Mail::to($to)->send(new MassMail($details));
        return 'Email Send Successfully';
    }
}
