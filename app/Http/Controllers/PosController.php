<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\expense;
use App\Models\invoice;
use App\Models\trainer;
use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function invoice_index()
    {
        $page_title = 'Manage Invoices';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new invoice();
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
        foreach ($req->exp_title as $key => $exp_title) {
            $data = new expense();
            $data->title = $exp_title;
            $data->desc = $req->exp_desc[$key];
            $data->amount = $req->exp_amount[$key];
            $data->quan = $req->exp_quan[$key];
            $data->disc = $req->exp_disc[$key];
            $data->tax = $req->exp_tax[$key];

            $data->save();
            return $key;
        }
        return redirect('create-expense');
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

    public function trainer_commision_index()
    {
        $page_title = 'Trainer Pay Slip';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new trainer();
        $name = "Syed Ghazanfar";
        $data = DB::select('SELECT  customers.id as customer_id, concat(customers.first_name, " ", customers.last_name) as customer_name, customers.date_of_joining, customers.month_end, customers.training_type, customers.trainer_name, customers.status, customers.fees_clear, customers.reference_name, customers.registration_fees, customers.gym_fees, customers.trainer_fees_per_session, customers.total_session, customers.advnace_allow, customers.advance_month, customers.discount, customers.avance_total, trainers.id as trainer_id ,concat(trainers.first_name, " ", trainers.last_name) as tname, trainers.fixed_salary, trainers.commision FROM `customers` left JOIN trainers ON customers.trainer_name = concat(trainers.first_name, " ", trainers.last_name)');
        // $data = DB::select('SELECT  customers.id as customer_id, concat(customers.first_name, " ", customers.last_name) as customer_name, customers.date_of_joining, customers.month_end, customers.training_type, customers.trainer_name, customers.status, customers.fees_clear, customers.reference_name, customers.registration_fees, customers.gym_fees, customers.trainer_fees_per_session, customers.total_session, customers.advnace_allow, customers.advance_month, customers.discount, customers.avance_total, trainers.id as trainer_id ,concat(trainers.first_name, " ", trainers.last_name) as tname, trainers.fixed_salary, trainers.commision FROM `customers` left JOIN trainers ON customers.trainer_name = concat(trainers.first_name, " ", trainers.last_name) WHERE customers.trainer_name = "' . $name . '"');
        // dd($data);
        return view('pos.trainerSlip', compact('page_title', 'page_description', 'action'), ['data' => $data]);
    }

    public function trainer_payslip_index($id)
    {
        $page_title = 'Trainer Pay Slip';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new trainer();
        $name = "Syed Ghazanfar";
        // $data = DB::select('SELECT  customers.id as customer_id, concat(customers.first_name, " ", customers.last_name) as customer_name, customers.date_of_joining, customers.month_end, customers.training_type, customers.trainer_name, customers.status, customers.fees_clear, customers.reference_name, customers.registration_fees, customers.gym_fees, customers.trainer_fees_per_session, customers.total_session, customers.advnace_allow, customers.advance_month, customers.discount, customers.avance_total, trainers.id as trainer_id ,concat(trainers.first_name, " ", trainers.last_name) as tname, trainers.fixed_salary, trainers.commision FROM `customers` left JOIN trainers ON customers.trainer_name = concat(trainers.first_name, " ", trainers.last_name)');
        $data = DB::select('SELECT  customers.id as customer_id, concat(customers.first_name, " ", customers.last_name) as customer_name, customers.date_of_joining, customers.month_end, customers.training_type, customers.trainer_name, customers.status, customers.fees_clear, customers.reference_name, customers.registration_fees, customers.gym_fees, customers.trainer_fees_per_session, customers.total_session, customers.advnace_allow, customers.advance_month, customers.discount, customers.avance_total, trainers.id as trainer_id ,concat(trainers.first_name, " ", trainers.last_name) as tname, trainers.fixed_salary, trainers.commision FROM `customers` left JOIN trainers ON customers.trainer_name = concat(trainers.first_name, " ", trainers.last_name) WHERE trainers.id =' . $id);
        // dd($data);
        return view('pos.slipView', compact('page_title', 'page_description', 'action'), ['datas' => $data]);
    }
}
