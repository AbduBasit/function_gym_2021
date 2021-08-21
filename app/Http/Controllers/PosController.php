<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function invoice_index(){
        $page_title = 'Manage Invoices';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new customer();
        $data = $db->all();
        return view('pos.manageInvoices', compact('page_title', 'page_description', 'action'), ['members'=> $data]);
    }
}
