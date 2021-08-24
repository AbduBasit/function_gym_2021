<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\expense;
use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function invoice_index()
    {
        $page_title = 'Manage Invoices';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new customer();
        $data = $db->all();
        return view('pos.manageInvoices', compact('page_title', 'page_description', 'action'), ['members' => $data]);
    }

    public function expense_index()
    {
        $page_title = 'Expenses Report';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new expense();
        $data = $db->all();
        return view('pos.manageExpense', compact('page_title', 'page_description', 'action'), ['datas' => $data]);
    }
    public function expense_create()
    {
        $page_title = 'Add Expenses';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('pos.createExpense', compact('page_title', 'page_description', 'action'));
    }
    public function add_expense(Request $req)
    {

        if ($req->ajax()) {
            $rule = array(
                'exp_title.*' => 'required',
                'exp_desc.*' => 'required',
                'exp_amount.*' => 'required',
                'exp_quan.*' => 'required',
                'exp_disc.*' => 'required',
                'exp_tax.*' => 'required',
                'exp_net.*' => 'required',
            );
            $error = Validator::make($req->all(), $rule);
            if ($error->fails()) {
                return response()->json(
                    [
                        'error' => $error->errors()->all(),
                    ]
                );
            }
            $exp_title = $req->exp_title;
            $exp_desc = $req->exp_desc;
            $exp_amount = $req->exp_amount;
            $exp_quan = $req->exp_quan;
            $exp_disc = $req->exp_disc;
            $exp_tax = $req->exp_tax;
            $exp_net = $req->exp_net;
            for ($count = 0; $count < count($exp_title); $count++) {
                $data = array(
                    'exp_title' => $exp_title[$count],
                    'exp_desc' => $exp_desc[$count],
                    'exp_amount' => $exp_amount[$count],
                    'exp_quan' => $exp_quan[$count],
                    'exp_disc' => $exp_disc[$count],
                    'exp_tax' => $exp_tax[$count],
                    'exp_net' => $exp_net[$count],

                );
                $insert_data[] = $data;
                expense::insert($insert_data);
                return response()->json([
                    'sucess' => 'data added success fully',
                ]);
            }
        }


        // return $item;
        // return redirect('/create-expense');

    }

    public function expense_delete($id)
    {
        $db = new expense();
        $data = $db->all()->find($id);
        $data->delete();
        return redirect('/manage-expense');
    }

    public function expense_edit($id)
    {
        $page_title = 'Update Expense';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new expense();
        $data = $db->all()->find($id);
        return view('pos.expenseEdit', compact('page_title', 'page_description', 'action'), ['datas' => $data]);
    }

    public function expense_edit_put(Request $req)
    {
        $db = new expense();
        $data = $db->all()->find($req->id);

        $data->title = $req->exp_title;
        $data->desc = $req->exp_desc;
        $data->amount = $req->exp_amount;
        $data->quan = $req->exp_quan;
        $data->disc = $req->exp_disc;
        $data->tax = $req->exp_tax;
        $data->net = $req->exp_net;

        $data->save();
        return redirect('manage-expense');
    }
}
