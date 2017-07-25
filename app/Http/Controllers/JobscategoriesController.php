<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\JobCategory;
class jobscategoriesController extends Controller{


    /*
     * Admin index
     */
    public function admin_index(Request $request){
        /*$jobsCategories=JobCategory::all();
        return view('jobscategories.admin_index')->with('jobsCategories',$jobsCategories);*/

        $jobsCategories=JobCategory::orderBy('id');
        $filter=$request['filter'];

        if(!empty($filter)){
            $jobsCategories->where('name','LIKE','%'.$filter.'%');

        }

        $jobsCategories=$jobsCategories->paginate();
        return view('jobscategories.admin_index')->with('jobsCategories',$jobsCategories);
    }

    public function admin_create(){
        return view('jobscategories.admin_create');
    }


    public function admin_store(Request $request)
    {
        JobCategory::create([
            'name'               =>$request['name'],
            'status'             =>$request['status'],
        ]);

        return redirect('/admin/jobscategories');
    }

    public function index(){
        $jobsCategories=JobCategory::lists('name','id');
        return view('index')->with('jobscategories',$jobsCategories);

    }

    /*public function index(){
        $jobsCategories=JobCategory::lists('name','id');
        return view('jobsCategories.index')->with('jobsCategories',$jobsCategories);

    }*/


     public function admin_edit($id){

         $jobCategory=JobCategory::findOrFail($id);
         return view('jobscategories.admin_edit',compact('jobCategory'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_update(Request $request, $id){

        $input=$request->all();
        $update=JobCategory::findOrFail($id);
        $update->update($input);
        return redirect('/admin/jobscategories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_delete($id){

        $jobCategory=JobCategory::findOrFail($id);
        $jobCategory->delete();
        return redirect('admin/jobscategories');



    }
}
