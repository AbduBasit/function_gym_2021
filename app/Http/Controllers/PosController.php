<?php

namespace App\Http\Controllers;

use App\Exports\ExpensesExport;
use App\Exports\InvoicesExport;
use App\Imports\ExpensesImport;
use App\Imports\InvoicesImport;
use App\Mail\PosMail;
use App\Models\cat_expense;
use App\Models\customer;
use App\Models\expense;
use App\Models\invoice;
use App\Models\trainer;
use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\While_;
use Excel;
use Illuminate\Support\Facades\Mail;

class PosController extends Controller
{


    public function export_invoice($value){
        if($value=='invoice_xlsx'){
            return Excel::download(new InvoicesExport, 'invoices_list.xlsx');
            return redirect('manage-invoice');
        }
        elseif($value=='invoice_csv'){
            return Excel::download(new InvoicesExport, 'invoices_list.csv');
            return redirect('manage-invoice');
        }
        else{
            return 'Error';
        }
    }

    public function import_invoice(Request $req){

        // dd($req->file('file_trainer'));
        Excel::import(new InvoicesImport, $req->file('file_invoice'));
        return redirect('manage-invoice');
    }



    public function export_expense($value){
        if($value=='expense_xlsx'){
            return Excel::download(new ExpensesExport, 'expenses_list.xlsx');
            return redirect('manage-expense');
        }
        elseif($value=='expense_csv'){
            return Excel::download(new ExpensesExport, 'expenses_list.csv');
            return redirect('manage-expense');
        }
        else{
            return 'Error';
        }
    }

    public function import_expense(Request $req){

        // dd($req->file('file_trainer'));
        Excel::import(new ExpensesImport, $req->file('file_expense'));
        return redirect('manage-expense');
    }


    public $result = null;
    public function invoice_index()
    {
        $page_title = 'Manage Invoices';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('pos.manageInvoices', compact('page_title', 'page_description', 'action'));
    }
    public function manage_invoice_data(Request $req){
        $data = null;
        $db = new invoice();

        if($req->post()){
           if($req->post('t_in') && $req->post('t_out')){
            $in = $req->post('t_in');
            $out = $req->post('t_out');
            $data = DB::select("SELECT * FROM invoices WHERE pay_date BETWEEN '$in' and '$out'");
            if($data){
                $target = $data;
                return $target;
            }
           }
     
        }
        else{
            $data = $db::all();
            $target= $data;
            return $target;
        }
    }
    public function invoice_update_fees($id){
        $page_title = 'Update Invoice';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;

        $db = new invoice();
        $data = $db->all()->find($id);
        return view('pos.updateFees', compact('page_title', 'page_description', 'action'), ['value'=>$data]);
    }
    public function update_invoice(Request $req, $id){
        // dd($req->all());
        $db = new invoice();
        $data = $db->all()->find($id);
        $data->fees_payable = $req->fees_status;
        $data->payment_method = $req->payment_type;
        $data->pay_date = $req->pay_date;
        $data->net_total = $req->amount;
        $data->discount = $req->discount;
        $net_total = $req->amount - $req->discount;;
        if($data->save()){
            if($data->customer_email){
                // dd($data);
                Mail::to($data->customer_email)->send(new PosMail($data));
            }
            return redirect('manage-invoice');
        }

    }
    public function invoice_delete_fees($id){
        $db = new invoice();
        $data = $db->all()->find($id);
        if($data->delete()){
            return redirect('manage-invoice');
        }
    }
    public function expense_index()
    {
        $page_title = 'Expenses Report';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('pos.manageExpense', compact('page_title', 'page_description', 'action'));
    }
    public function manage_expense_data(Request $req){
        $data = null;
        $db = new expense();

        if($req->post()){
           if($req->post('t_in') && $req->post('t_out')){
            $in = $req->post('t_in');
            $out = $req->post('t_out');
            $data = DB::select("SELECT * FROM expenses WHERE pay_date BETWEEN '$in' and '$out'");
            if($data){
                $target = $data;
                return $target;
            }
           }
     
        }
        else{
            $data = $db::all();
            $target= $data;
            return $target;
        }
    }

    public function expense_create()
    {
        $page_title = 'Add Expenses';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new cat_expense();
        $data = $db->all();

        return view('pos.createExpense', compact('page_title', 'page_description', 'action'), ['data' => $data]);
    }
    public function add_expense(Request $req)
    {
        $db = new expense();

        $values = [
            'title' => $req->post('title')[0],
            'desc' => $req->post('desc')[0],
            'pay_date' => $req->post('date')[0],
            'amount' => $req->post('amount')[0],
            'quan' => $req->post('quan')[0],
            'disc' => $req->post('disc')[0],
            'tax' => $req->post('tax')[0],
            'net' => ($req->post('amount')[0] * $req->post('quan')[0])-$req->post('disc')[0]+($req->post('amount')[0] * $req->post('tax')[0] / 100),
        ];
        DB::table('expenses')->insert($values);
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
        $data->pay_date = $req->exp_date;
        $data->amount = $req->exp_amount;
        $data->quan = $req->exp_quan;
        $data->disc = $req->exp_disc;
        $data->tax = $req->exp_tax;
        $data->net = ($req->exp_amount * $req->exp_quan)-$req->exp_disc+$req->exp_tax;

        $data->save();
        return redirect('manage-expense');
    }

    public function expense_cat_index()
    {
        $page_title = 'Expense Categories';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;

        $db = new cat_expense();
        $data = $db->all();
        return view('pos.expenseCat', compact('page_title', 'page_description', 'action'), ['data' => $data]);
    }

    public function expense_cat_store(Request $req)
    {
        $db = new cat_expense();
        $db->expense_title = $req->catname;
        $db->expense_description = $req->catdesc;
        $db->save();
        return redirect('expense_category');
    }
    public function expense_cat_delete($id)
    {
        $db = new cat_expense();
        $data = $db->all()->find($id);
        $data->delete();
        return redirect('expense_category');
    }

    public function trainer_commision_index()
    {
        $page_title = 'Trainer Pay Slip';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $date = date("m/y", strtotime("-1 months"));
        $db = new trainer();
        $name = "Syed Ghazanfar";
        $data = DB::select('SELECT customers.reference_name, SUM(customers.registration_fees) as registration_fees , trainers.salary_status, SUM(customers.gym_fees) as gym_fees, SUM(customers.trainer_fees_per_session) as trainer_fees_per_session, SUM(customers.total_session) as total_session, trainers.id as trainer_id ,concat(trainers.first_name, " ", trainers.last_name) as tname, trainers.fixed_salary, trainers.commision FROM `customers` right JOIN trainers ON customers.trainer_name = concat(trainers.first_name, " ", trainers.last_name) GROUP BY tname');




        // $data = DB::select('SELECT  customers.id as customer_id, concat(customers.first_name, " ", customers.last_name) as customer_name, customers.date_of_joining, customers.month_end, customers.training_type, customers.trainer_name, customers.status, customers.fees_clear, customers.reference_name, customers.registration_fees, customers.gym_fees, customers.trainer_fees_per_session, customers.total_session, customers.advnace_allow, customers.advance_month, customers.discount, customers.avance_total, trainers.id as trainer_id ,concat(trainers.first_name, " ", trainers.last_name) as tname, trainers.fixed_salary, trainers.commision FROM `customers` left JOIN trainers ON customers.trainer_name = concat(trainers.first_name, " ", trainers.last_name) WHERE customers.trainer_name = "' . $name . '"');
        // dd($data);
        return view('pos.trainerSlip', compact('page_title', 'page_description', 'action'), ['data' => $data, 'date' => $date]);
    }

    public function trainer_payslip_index($id)
    {


        $page_title = 'Trainer Pay Slip';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new trainer();
        $name = "Syed Ghazanfar";
        // $data = DB::select('SELECT  customers.id as customer_id, concat(customers.first_name, " ", customers.last_name) as customer_name, customers.date_of_joining, customers.month_end, customers.training_type, customers.trainer_name, customers.status, customers.fees_clear, customers.reference_name, customers.registration_fees, customers.gym_fees, customers.trainer_fees_per_session, customers.total_session, customers.advnace_allow, customers.advance_month, customers.discount, customers.avance_total, trainers.id as trainer_id ,concat(trainers.first_name, " ", trainers.last_name) as tname, trainers.fixed_salary, trainers.commision FROM `customers` left JOIN trainers ON customers.trainer_name = concat(trainers.first_name, " ", trainers.last_name)');
        $data = DB::select('SELECT trainers.date_of_pay, customers.reference_name, SUM(customers.registration_fees) as registration_fees , SUM(customers.gym_fees) as gym_fees, SUM(customers.trainer_fees_per_session) as trainer_fees_per_session, SUM(customers.total_session) as total_session, trainers.id as trainer_id ,concat(trainers.first_name, " ", trainers.last_name) as tname, trainers.fixed_salary, trainers.commision FROM `customers` left JOIN trainers ON customers.trainer_name = concat(trainers.first_name, " ", trainers.last_name) WHERE trainers.id =' . $id);

        // dd($data[0]->tname);
        $data1 = new invoice();

        // Reference Commision  
        $date = date("m", strtotime("-1 months"));
        $inv = DB::select('SELECT sum(registration_fees) as reg_fee from invoices  where reference = "' . $data[0]->tname . '" and MONTH(pay_date) = ' . $date);

        $rule = DB::select('select * from rules where rules_token = "RC_A1003"')[0];
        $calc = $inv[0]->reg_fee * $rule->values / 100;

        // dd($inv);
        // Retians Commision
        $date1 = date("m", strtotime("-3 months"));
        $_Query_1 = DB::select('SELECT customers.trainer_name, MONTH(trainers.date_of_pay) as t_dop, ' . $date1 . ' as i_dop FROM customers inner JOIN trainers ON customers.trainer_name=concat(trainers.first_name, " ", trainers.last_name) inner JOIN invoices ON customers.trainer_name=invoices.trainer_name WHERE invoices.trainer_name = "' . $data[0]->tname . '"');
        if ($_Query_1 != null) {
            $t_dop = $_Query_1[0]->t_dop;
            $i_dop = $_Query_1[0]->i_dop;
            // SELECT customer_name, sum(gym_fees) as fee , Month(pay_date) as month FROM invoices WHERE MONTH(pay_date) BETWEEN ' . $i_dop . ' and ' . $t_dop . ' and trainer_name = "' . $data[0]->tname . '" group by customer_name
            $_Query_2 = DB::select('select concat(first_name, " ", last_name) as name, trainer_name from customers where trainer_name = "' . $data[0]->tname . '"');


            foreach ($_Query_2 as $key => $value) {
                // $ss = $key;
                // dd($value);
                $_Query_3 = DB::select('select MONTH(pay_date) as pdate, customer_name, gym_fees, sum(gym_fees) over () as newcp FROM invoices where MONTH(pay_date) BETWEEN ' . $i_dop . ' and ' . $t_dop . ' and customer_name = "' . $_Query_2[$key]->name . '" and trainer_name = "' . $data[0]->tname . '" order by customer_name, pdate');
                $array = json_decode(json_encode($_Query_3), true);
                foreach ($_Query_3 as $value => $key) {
                    $array[] = [$value, 'like', $key];
                    $n = array_column($array, 'pdate');
                    if (count($n) == 3) {
                        $range = range($t_dop, $i_dop);
                        if ($n[0] == $range[3] && $n[1] == $range[2] && $n[2] == $range[1]) {
                            $value = array_sum(array_column($array, 'gym_fees'));
                            $rule1 = DB::select('select * from rules where rules_token = "RC_A1004"')[0];
                            $result1 = round($value * $rule1->values / 100);
                        } else {
                            $result1 = 0;
                        }
                    } else {
                        $result1 = 0;
                    }
                }
                return view('pos.slipView', compact('page_title', 'page_description', 'action'), ['datas' => $data, 'inv' => $calc, 'result' => $result1]);
            }
        }
        // return view('pos.slipView', compact('page_title', 'page_description', 'action'), ['datas' => $data, 'inv' => $calc, 'result' => null]);
    }
    public function invoicePrint($id){
        $page_title = 'Invoice';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new invoice();
        $data = $db->all()->find($id);
        return view('pos.invoice', compact('page_title', 'page_description', 'action'), ['data' => $data]);
    }
    public function status_change_index($id)
    {
        $page_title = 'Trainer Pay Slip';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db = new trainer();
        $tid = $db->select('id')->find($id);
        $data = DB::select('SELECT customers.reference_name, SUM(customers.registration_fees) as registration_fees , SUM(customers.gym_fees) as gym_fees, SUM(customers.trainer_fees_per_session) as trainer_fees_per_session, SUM(customers.total_session) as total_session, trainers.id as trainer_id ,concat(trainers.first_name, " ", trainers.last_name) as tname, trainers.fixed_salary, trainers.commision FROM `customers` left JOIN trainers ON customers.trainer_name = concat(trainers.first_name, " ", trainers.last_name) WHERE trainers.id =' . $id);




        // dd($data[0]);
        return view('pos.indexStatus', compact('page_title', 'page_description', 'action'), ['data' => $data[0], 'id' => $tid]);
    }
    public function index_status(){
        $page_title = 'Trainer Scheduling';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('pos.trainerStatus', compact('page_title', 'page_description', 'action'));
    }
    public function status_change(Request $req)
    {

        $data1 = new trainer();
        $exp = new expense();

        $trainer = $data1->all()->find($req->id);
        $trainer_name = $trainer->first_name . ' ' . $trainer->last_name . " Salary";
        $exp->title = $trainer_name;
        $exp->desc = 'Salary Expense';
        $exp->amount = $req->amount;
        $exp->pay_date = $req->pay_date;
        $exp->quan = 1;
        $exp->disc = 0;
        $exp->tax = 0;
        $exp->net = $req->amount;
        $trainer->date_of_pay = $req->pay_date;
        $trainer->salary_status = $req->salary_status;

        if ($exp->save()) {
            $trainer->save();
            return redirect('trainer_payslip');
        } else {
            return 'Something Went Wrong';
        }

        // $trainer->save();
    }
}
