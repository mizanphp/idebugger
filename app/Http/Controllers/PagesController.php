<?php

namespace App\Http\Controllers;
use Log;
use DB;
use Session;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Country;
use App\JobCategory;
use App\Designation;
use App\Organizations;
use App\Employees;
use App\User;
use App\Http\Controllers\Controller;

class PagesController extends Controller{

    public function index(Request $request) {

        $totalOrg=Organizations::all()->count();
        $totalEmp=Employees::all()->count();
        $totalUsers=User::all()->count();



        if(isset($request['designation'])) {

            $employees = Employees::where(function ($q) use ($request) {
                $q->where('countries_id',$request['country'])
                    ->where('jobs_categories_id',$request['jobCategory'])
                    ->where('designations_id',$request['designation'])
                    ->whereHas('user', function ($q) use ($request) {
                        $q->where(function ($q) use ($request) {
                            $q->where('email', 'like', '%'.$request['filter'].'%')
                            ->where('first_name', 'like', '%'.$request['filter'].'%')
                            ->where('last_name', 'like', '%'.$request['filter'].'%');
                        });
                    });
            })->paginate(8);

            if($employees->count()==0){
                Session::flash('message','No result found!');
                Session::flash('className','alert-danger');
            }


            return view('employees.employees',compact('employees','countries','jobsCategories','designations'));

        }else if(!isset($request['designation']) and  isset($request['country'])) {

            $organizations = Organizations::where(function ($q) use ($request) {
                $q->where('countries_id',$request['country'])
                    ->where('jobcategory_id',$request['jobCategory'])
                    ->where('name','like', '%'.$request['filter'].'%');
            })->paginate(8);

            if($organizations->count()==0){
                Session::flash('message','No result found!');
                Session::flash('className','alert-danger');
            }

            return view('organizations.organizations',compact('organizations','countries','jobsCategories'));

        }


        $countries=Country::lists('name','id');
        $jobsCategories=JobCategory::lists('name','id');
        $designations=Designation::lists('name','id');


        return view('index',compact('countries','jobsCategories','designations','organizations','totalOrg','totalEmp','totalUsers'));
    }

}
