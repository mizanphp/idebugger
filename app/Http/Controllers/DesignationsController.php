<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Designation;
class DesignationsController extends Controller{


    /*
     * Admin index
     */
    /*public function admin_index(){
        $designations=Designation::all();
        return view('designations.admin_index',compact('designations'));
    }*/
    public function admin_index(Request $request){
        $designations=Designation::orderBy('id');
        $filter=$request['filter'];

        if(!empty($filter)){
            $designations->where('name','LIKE','%'.$filter.'%');

        }

        $designations=$designations->paginate();
        return view('designations.admin_index' ,compact('designations'));

        /*
         * Search without just data show
         */
        /*$alldata=Course::paginate(2);
        return view('course.index' ,compact('alldata'));*/
    }



    public function admin_create(){
        return view('designations.admin_create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_store(Request $request)
    {
        Designation::create([
            'name'               =>$request['name'],
            'status'               =>$request['status'],
        ]);

        return redirect('/admin/designations');
    }



    public function admin_edit($id){

        $designations=Designation::findOrFail($id);
        return view('designations.admin_edit',compact('designations'));

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
        $update=Designation::findOrFail($id);
        $update->update($input);
        return redirect('/admin/designations');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_delete($id){

        $designation=Designation::findOrFail($id);
        $designation->delete();
        return redirect('admin/designations');
    }
}
