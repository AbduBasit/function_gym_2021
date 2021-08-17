<?php

namespace App\Http\Controllers;

use App\Models\rule;
use Illuminate\Http\Request;

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
}
