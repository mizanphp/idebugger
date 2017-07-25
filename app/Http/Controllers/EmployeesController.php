<?php

namespace App\Http\Controllers;

use App\Organizations;
use Log;
use DB;
use Session;
use Redirect;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employees;
use App\Designation;
use App\JobCategory;
use App\Country;
use App\Feedback;
use App\User;
use Auth;

class EmployeesController extends Controller
{

    public function index(Request $request){

        if(isset($request['filter'])){

            $keyword=$request['filter'];

            $employees = Employees::where(function ($q) use ($keyword) {
                $q->where('salary', 'like', '%'.$keyword.'%')
                    ->orWhere('job_nature', 'like', '%'.$keyword.'%')
                    ->orWhereHas('user', function ($q) use ($keyword) {
                        $q->where(function ($q) use ($keyword) {
                            $q->where('first_name', 'like', '%'.$keyword.'%')
                                ->orWhere('last_name', 'like', '%'.$keyword.'%')
                                ->orWhere('email', 'like', '%'.$keyword.'%');
                        });
                    });
            })->paginate(8);



            return view('employees.employees' ,compact('employees'));
        }

        $employees=Employees::paginate(8);
        return view('employees.employees' ,compact('employees'));
    }


    public function create($organization_id){ // organization_id

        $designations=Designation::lists('name','id');
        $countries=Country::lists('name','id');
        $JobCategory=JobCategory::lists('name','id');

        $users = $organizations = array();
        $is_assign_a_job = false;
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $organizations = Organizations::where('user_id',$user_id)->where('id',$organization_id)->get();

            if($organizations->count()>0){
                $is_assign_a_job = true;
                $users = User::lists('email','id');
            }
        }
        return view('employees.employees_create',compact('designations','countries','JobCategory','organization_id','is_assign_a_job','users'));
    }


    public function store(Request $request)
    {
        if(!empty($request['user_id'])){
            $user = $request['user_id'];
        }else{
            $user=Auth::user()->id;
        }


        Employees::create([
            'user_id'               =>$user,
            'organizations_id'      =>$request['organizations_id'],
            'designations_id'       =>$request['designation'],
            'jobs_categories_id'    =>$request['category'],
            'countries_id'          =>$request['country'],
            'salary'                =>$request['salary'],
            'job_nature'            =>$request['job_nature'],
            'job_location'          =>$request['job_location'],
            'is_still_working'      =>$request['is_still_working'],
            'joining_date'          =>$request['joining_date'],
            'leaving_date'          =>$request['leaving_date'],
            'overview'              =>$request['overview']
        ]);
        Session::flash('message','Employee has been successfully created under this company');
        Session::flash('className','alert-danger');
        return redirect('/employees/organization_employees/'.$request['organizations_id']);
    }


    public function show($id){
        $is_enable_feedback_btn = false;

        $employees=Employees::findOrFail($id);


        if(Auth::check()){

            $user_id = Auth::user()->id;
            $organization_id = $employees->organizations_id;

            // this employee is under this org
            $organization = Organizations::where('id',$organization_id)->where('user_id',$user_id)->first();
            if(!empty($organization)){
                if($organization->count()>0 and $organization_id==$organization->id){
                    $is_enable_feedback_btn = true;
                }
            }
        }

        $feedbacks = Feedback::where('to_id',$id)->get();

        return view('employees.employee_details',compact('employees','is_enable_feedback_btn','feedbacks'));
    }


    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }

    public function admin_index(Request $request){
        /*$employees=Employees::all();
        return view('employees.admin_index',compact('employees'));*/


        $employees=Employees::orderBy('id');
        $filter=$request['filter'];
        if(!empty($filter)){
            $employees->where('job_location','LIKE','%'.$filter.'%');
        }
        $employees=$employees->paginate();
        return view('employees.admin_index',compact('employees'));


    }

    public function admin_details($id){
        $employees=Employees::find($id);
        //Log::info($employees);
        return view('employees.admin_details')->with('employees',$employees);
    }



    public function organization_employees($id){

        $employees = DB::table('employees')
            ->select('users.*','employees.user_id as u_id','employees.job_location as job_location','employees.is_approve as is_approve','employees.organizations_id as organization_id','employees.id as emp_id','organizations.name as name')
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->join('organizations', 'employees.organizations_id', '=', 'organizations.id')
            ->where('employees.organizations_id','=',$id)
            ->get();

        if(count($employees)==0){
            Session::flash('message','Employee could not found under this organization!, Please recruit employee first');
            Session::flash('className','alert-danger');
            return Redirect::to('/organizations/show/'.$id);
        }


        return view('employees.employee_organization_employees',compact('employees'));
    }


}
