
@extends('layouts.master')
@section('title','Create Employee')

@section('content')


<section>
    <div class="top-heading">
        <h1 class="animated fadeInRight">Create Employee</h1>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <div class="organization">
                    <h2>Employee</h2>
                    {!! Form::open(array('route' => 'employees.store','method'=>'POST','class'=>'form-group','id'=>'EmployeeCreateForm')) !!}

                    @if($is_assign_a_job)
                    <div class="form-group">
                        {!! Form :: label('Employee')!!} <em >*</em>
                        {!! Form :: select('user_id', $users,
                        '--Select--',array('class'=>'form-control','placeholder'=>'--Select--')) !!}
                    </div>
                    @endif

                    <div class="form-group">
                        {!! Form :: label('Designation')!!} <em >*</em>
                        {!! Form :: select('designation', $designations,
                        '--Select--',array('class'=>'form-control','placeholder'=>'--Select--')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form :: label('Job Categories')!!} <em >*</em>
                        {!! Form :: select('category', $JobCategory,
                        '--Select--',array('class'=>'form-control','placeholder'=>'--Select--')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form :: label('Country')!!} <em >*</em>
                        {!! Form :: select('country', $countries,
                        '--Select--',array('class'=>'form-control','placeholder'=>'--Select--')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form :: label('Salary')!!}
                        {!! Form :: number('salary', $value=null ,array('class'=>'form-control','min'=>0)) !!}
                    </div>

                    <div class="form-group">
                        {!! Form :: label('Job Nature ')!!} <em >*</em>
                        {!! Form :: select('job_nature', array(''=>'--Select--', 'Part Time' => 'Part Time', 'Full Time' => 'Full Time'),
                        '--Select--',array('class'=>'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form :: label('Job Location')!!} <em >*</em>
                        {!! Form :: text('job_location',$value=null, array('class'=>'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form :: label('Joining Date')!!} <em >*</em>
                        {!! Form :: text('joining_date','', array('class'=>'form-control datepicker')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form :: label('Leaving Date')!!} <em >*</em>
                        {!! Form :: text('leaving_date',$value=null, array('class'=>'datepicker form-control','id'=>'leaving_date')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form :: checkbox('is_still_working',$value=1,null,array('id' => 'is_still_working')) !!}
                        {!! Form :: label('Is Still Working ')!!} <em >&nbsp</em>
                    </div>

                    <!--<div class="form-group">
                        {!! Form::hidden('is_still_working',$value=0)!!}
                    </div>-->

                    <div class="form-group">
                        {!! Form::label('Overview') !!}
                        {!! Form::textarea('overview',$value=null,array('class'=>'form-control'))!!}
                    </div>

                    <div class="form-group">
                        {!! Form :: hidden('organizations_id',$value=$organization_id, array('class'=>'form-control')) !!}
                    </div>

                    <div class="login">
                        {!! Form::submit('Submit', array('class'=>'btn btn-success pull-right')) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function(){

        jQuery('#EmployeeCreateForm').validate({

            rules: {
                designation: "required",
                category: "required",
                country: "required",
                salary: "required",
                job_nature: "required",
                job_location: "required",
                joining_date: "required",
                //leaving_date: "required",
                overview: "required"
            }
            /*messages: {
                name: "Please enter your Name",
                phone: "Please enter your Phone",
                descriptions: "Please enter your Descriptions",
                address: "Please enter your Address",
                logo: "Please enter your Logo",
                email: "Please enter a valid email address"
            }*/

        });

        jQuery('#is_still_working').click(function(){
            jQuery('#leaving_date').val('');
        });
    });
</script>


@endsection




