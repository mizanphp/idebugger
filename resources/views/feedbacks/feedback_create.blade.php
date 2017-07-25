
@extends('layouts.master')
@section('title','Create Feedback')

@section('content')


<section>
    <div class="top-heading">
        <h1 class="animated fadeInRight">Create Feedback</h1>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-sm-offset-2">
                <div class="back">
                    <a class="btn btn-default" href="{{ URL::previous() }}">Go Back</a>
                </div>

                @if(Session :: has('message'))
                <div class="alert {{Session::get('className')}}">
                    {{Session :: get('message')}}
                </div>
                @endif

                <?php
                    if(isset($_GET['employee_id']) && isset($_GET['organization_id'])){
                        $employee_id=$_GET['employee_id'];
                        $organization_id=$_GET['organization_id'];
                    }
                ?>

                <div class="organization">
                    <h2>Feedback</h2>

                    {!! Form::open(array('url'=>'feedbacks/store','method'=>'POST','class'=>'form-group','id'=>'FeedbackCreateForm')) !!}

                    <div class="from-control">
                        {!! Form::label('Message') !!}
                        {!! Form::textarea('message',$value=null,array('class'=>'form-control'))!!}
                    </div>

                    <div class="from-control">
                        {!! Form :: label('Rating') !!}
                        <div id='rateYo'></div>
                        {!! Form :: hidden('rating_feedback','')!!}
                    </div>

                    <div class="form-group">
                       @if(isset($_GET['employee_id']) && isset($_GET['organization_id']))
                       {!! form::hidden('employees_id',$value=$employee_id) !!}
                       {!! form::hidden('organizations_id',$value=$organization_id) !!}
                       @endif
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

        jQuery('#FeedbackCreateForm').validate({

            rules: {
                message: "required"
            }

        });
    });
</script>
@endsection




