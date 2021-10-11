<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    //Check Point
    public function checkpoint(Request $req)
    {
        // if(!){
        //     throw ValidationException::withMessages([
        //         'email' => "invalid Creditials",
        //     ]);
        // }
        // else{
        //     return redirect('dashboard');
        // }
        $dataProtected = DB::select("select * from users where email='$req->email' and password='$req->password'");
        $resultAc = count($dataProtected);
        if ($resultAc == 1) {
            $data = "";
            $db = new User();
            if($dataProtected[0]->roles == "admin"){
                 $req->session()->put('adminUser', $dataProtected[0]);
                //  dd($data);
                 return redirect('dashboard');
            }
            else{
                $req->session()->put('userUser', $dataProtected[0]);
                return redirect('dashboard');
            }
          
            
        } else {
            return redirect('/');
        }
    }
    function logout()
    {
        if (session()->has('adminUser')) {
            session()->pull('adminUser', null);
            return redirect('/');
        }
         else if(session()->has('userUser')) {
            session()->pull('userUser', null);
            return redirect('/');
        }
    }


    public function create_users_data()
    {
        $page_title = 'Add User';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;

        return view('users.createnew', compact('page_title', 'page_description', 'action'));
    }
    public function create_new_user(Request $req){

        
        $db= new User();
        // dd($req->all());
        $db->name = $req->name;
        $db->email = $req->email_user;
        $db->password = $req->passwoRd;
        $db->phone = $req->phone;
        $db->address = $req->place;
        $db->roles = $req->roles;
        $db->dob = $req->dob;
        $db->designation = $req->designation;
        $db->doj = $req->doj;
        $db->cnic = $req->cnic;
        $db->salary = $req->fixed_salary;
        $db->t_in = $req->tin;
        $db->t_out = $req->tout;
          // Image Section
          if ($req->file('image')) {
            $image_original = $req->file('image');
            $extension = $image_original->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $image_original->move('upload/users/', $fileName);
            $db->image = $fileName;
        }
        if ($db->save()) {
            return redirect('manage-user');
        }
    }

    public function user_manage(){
        $page_title = 'Manage Users';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('users.manage', compact('page_title', 'page_description', 'action'));
    }
    public function user_manage_fetch(){
        $db=new User();
        $data = $db->all();
        return $data;
    }
    public function user_delete($id){
        $db=new User();
        $data = $db->all()->find($id);
        if($data->delete()){
            return redirect('manage-user');
        }
    }
    public function user_edit($id){
        $page_title = 'Update User';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $db=new User();
        $data = $db->all()->find($id);
        return view('users.editIndex', compact('page_title', 'page_description', 'action'), ['data'=>$data]);
    }
    public function update_user_data(Request $req){
        $db= new User();
        $data = $db->all()->find($req->id);
        // dd($req->all());
        $data->name = $req->name;
        $data->email = $req->email_user;
        $data->password = $req->passwoRd;
        $data->phone = $req->phone;
        $data->address = $req->place;
        $data->roles = $req->roles;
        $data->designation = $req->designation;
        $data->dob = $req->dob;
        $data->doj = $req->doj;
        $data->cnic = $req->cnic;
        $data->salary = $req->fixed_salary;
        $data->t_in = $req->tin;
        $data->t_out = $req->tout;
          // Image Section
          if ($req->file('image')) {
            $image_original = $req->file('image');
            $extension = $image_original->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $image_original->move('upload/users/', $fileName);
            $data->image = $fileName;
        }
        if ($data->save()) {
            return redirect('manage-user');
        }
    }
}
