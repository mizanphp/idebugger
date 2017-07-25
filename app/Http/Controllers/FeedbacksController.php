<?php

namespace App\Http\Controllers;
use Log;
use Session;
use Redirect;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Feedback;
use App\Employees;

class FeedbacksController extends Controller{

    public function feedback_create(){

        return view('feedbacks.feedback_create');
    }

    public function store(Request $request){

        $employee_id=$request['employees_id'];
        $organizations_id=$request['organizations_id'];
        $checkOrgID=Feedback::where('employees_id',$employee_id)->where('form_id',$organizations_id)->get();
        $count=count($checkOrgID);
        if($count==0){

            Feedback::create([
                'message'               =>$request['message'],
                'rating_feedback'       =>$request['rating_feedback'],
                'employees_id'          =>$request['employees_id'],
                'organizations_id'      =>$request['organizations_id'],
                'form_id'               =>$request['organizations_id'],
                'to_id'                 =>$request['employees_id'],
            ]);

            Session::flash('message','Feedback has been successfully added !');
            Session::flash('className','alert-success');
            return Redirect::to('/organizations/show/'.$organizations_id);
        }else{
            Session::flash('message','Feedback already given !');
            Session::flash('className','alert-danger');
            return Redirect::to('/organizations/show/'.$organizations_id);
        }
    }

    public function feedbackOrg(){
        return view('feedbacks.feedbackOrg');
    }

    public function storeOrg(Request $request){

        $employee_id=$request['employees_id'];
        $organization=$request['organizations_id'];

        $organization_feedback=Feedback::where('to_id',$employee_id)->where('form_id',$organization)->get()->count();


        if($organization_feedback>0){

            /*
             * Employee id check
             */
            $organization_id=$request['organizations_id'];
            $employee_id=$request['employees_id'];
            $checkEmpId=Feedback::where('organizations_id',$organization_id)->where('form_id',$employee_id)->get();
            $count=count($checkEmpId);
            if($count == 0){

                Feedback::create([
                    'message'               =>$request['message'],
                    'rating_feedback'       =>$request['rating_feedback'],
                    'employees_id'          =>$request['employees_id'],
                    'organizations_id'      =>$request['organizations_id'],
                    'form_id'               =>$request['employees_id'],
                    'to_id'                 =>$request['organizations_id'],
                ]);

                Session::flash('message','Feedback has been successfully added !');
                Session::flash('className','alert-success');
                return Redirect::to('/employees/'.$employee_id);
            }else{
                Session::flash('message','Feedback already given !');
                Session::flash('className','alert-danger');
                return Redirect::to('/employees/'.$employee_id);
            }

        }else{
            Session::flash('message','Organization yet to be given feedback !');
            Session::flash('className','alert-danger');
            return Redirect::to('/employees/'.$employee_id);
        }
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('feedbacks.feedbacks_create_org');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        Feedback::create([
        'message'               =>$request['message'],
        'rating_feedback'       =>$request['rating_feedback'],

    ]);

        return redirect('/feedbacks/show');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
