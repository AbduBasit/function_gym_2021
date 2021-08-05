<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\user;

class UserController extends Controller
{
    //Check Point
    public function checkpoint(Request $req)
    {

        $dataProtected = DB::select("select * from users where email='$req->email' and password='$req->password'");
        $resultAc = count($dataProtected);
        if ($resultAc == 1) {
            $data = "";
            $req->session()->put('adminUser', $data);
            return redirect('dashboard');
        } else {
            return redirect('/');
        }
    }
    function logout()
    {
        if (session()->has('adminUser')) {
            session()->pull('adminUser', null);
            return redirect('/');
        } else {
        }
    }
}
