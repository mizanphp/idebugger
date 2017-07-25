<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Log;
use Session;
use Redirect;
use App\User;
class DashboardsController extends Controller{

    public function admin_index(){
        return view('admin_login');
    }

    public function admin_login_action(Request $request) {
        $email=$request['email'];
        $is_admin=User::where('role_id','=',1)->where('email','=',$email)->get();

        if($is_admin->count()>0){
            return redirect('/admin/dashboard');
        }else{
            Session::flash('message','Username or password did not match!');
            Session::flash('className','alert-danger');
            return redirect('/admin');
        }
    }

    public function admin_dashboard(){
        return view('admin_index');
    }

}
