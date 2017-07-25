<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\OrganizationsRequest;
use App\Http\Controllers\Controller;
use App\Organizations;
use App\Employees;
use App\Country;
use App\User;
use App\JobCategory;
use App\Feedback;
use Auth;

class OrganizationsController extends Controller{

    public function index(Request $request){

        if(isset($request['filter'])){
            $keyword=$request['filter'];
            $organizations=Organizations::where('name','LIKE','%'.$keyword.'%')
                ->orWhere('address','LIKE','%'.$keyword.'%')
                ->orWhere('email','LIKE','%'.$keyword.'%')
                ->orderBy('id', 'desc')
                ->paginate(8);
            return view('organizations.organizations' ,compact('organizations'));
        }


        // is user employee or owner
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $get_organizations=Organizations::where('user_id','=',$user_id)->paginate(8);
            $total_organizations = $get_organizations->count();
        }else{
            $total_organizations = 0;
        }

        if($total_organizations>0){
            $organizations = $get_organizations;
        }else{
            $organizations=Organizations::paginate(8);
        }


        return view('organizations.organizations' ,compact('organizations'));
    }



    public function create(){
       /* $user=Auth::user();
        return view('organizations.create_organizations',compact('user'));*/
        $countries=Country::lists('name','id');
        $jobsCategories=JobCategory::lists('name','id');
        return view('organizations.organizations_create',compact('countries','jobsCategories'));
    }



    public function store(OrganizationsRequest $request){
        //Log::info($request['address']);

        if(isset($request['logo'])){
        //get the file
        $file = $request['logo'];

        //create a file path
        $path = 'uploads/logo';

        //get the file name
        $file_name =md5(microtime() . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
        $upload_logo=$file_name;


        //save the file to your path
        $file->move($path , $file_name); //( the file path , Name of the file)

        //save that to your database
        /*$new_file = new Organizations(); your database model
        $new_file->logo = $file_name;
        $upload_logo=$new_file->save();*/
        }else{
            $upload_logo=null;
        }
        $user=Auth::user()->id;
            Organizations::create([
            'user_id'         => $user,
            'countries_id'    => $request['country'],
            'jobcategory_id'  => $request['jobcategory'],
            'name'            => $request['name'],
            'logo'            =>$upload_logo,
            'phone'           => $request['phone'],
            'address'         => $request['address'],
            'sublocality'     => $request['sublocality'],
            'district'        => $request['district'],
            'division'        => $request['division'],
            'postal_code'     => $request['postal_code'],
            'lat'             => $request['lat'],
            'lng'             => $request['lng'],
            'email'           => $request['email'],
            'descriptions'    =>$request['descriptions'],
        ]);

        return redirect('/organizations');
    }


    public function show($id)
    {
        $employee = $is_assign_a_job = $is_show_feedback_btn = false;

        if(Auth::check()){
            $user_id = Auth::user()->id;
            $employee = Employees::where('organizations_id',$id)->where('user_id',$user_id)->where('is_approve',1)->first();

            if(!empty($employee) and $employee->count()>0){
                $is_show_feedback_btn = true;
            }

            $organizations = Organizations::where('user_id',$user_id)->where('id',$id)->get();
            if($organizations->count()>0){
                $is_assign_a_job = true;
            }
        }

        $organizations=Organizations::findOrFail($id);
        $feedbacks = Feedback::where('to_id',$id)->get();

        return view('organizations.organization_details',compact('organizations','is_show_feedback_btn','is_assign_a_job','employee','feedbacks'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function admin_index(Request $request){
        /*$organizations=Organizations::all();
        return view('organizations.admin_index')->with('organizations',$organizations);*/

        $organizations=Organizations::orderBy('id');
        $filter=$request['filter'];

        if(!empty($filter)){
            $organizations->where('name','LIKE','%'.$filter.'%');

        }


        $organizations=$organizations->paginate();
        return view('organizations.admin_index' ,compact('organizations'));


    }

    public function admin_details($id){
        $organizations=Organizations::find($id);
        return view('organizations.admin_details')->with('organizations',$organizations);
    }

    public function is_user_available(Request $request){
        $checkEmail=$request['email'];
        $email=Organizations::where('email',$checkEmail)->get();
        $count=count($email);
        if($count==0){
            echo 'true';die;
        }else{
            echo 'false';die;
        }

    }


}
