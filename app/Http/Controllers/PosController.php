<?php

namespace App\Http\Controllers;

use App\Models\customer;
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
        return view('pos.manageExpense', compact('page_title', 'page_description', 'action'));
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
        $title = $req->exp_title;
        $desc = $req->exp_desc;
        $amount = $req->exp_amount;
        $quan = $req->exp_quan;
        $disc = $req->exp_disc;
        $tax = $req->exp_tax;
        $net = $req->exp_net;

        foreach ($title as $index => $titles) {
            echo $titles . $desc[$index] . $amount[$index] . $quan[$index] . $disc[$index] . $tax[$index];
        }
    }
}
