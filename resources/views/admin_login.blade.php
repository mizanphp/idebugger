@extends('layouts.admin_login')
@section('title','Admin | Login')
@section('content')
    <div class="admin">
        {!! Html ::link('/','IDEBUGGER') !!}

    </div>

    <div class="col-md-4 col-md-offset-4">
        @if(Session :: has('message'))
        <div class="alert {{Session::get('className')}}">
            {{Session :: get('message')}}
        </div>
        @endif

        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Admin Login</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(array('url'=>'/admin/login/action','method'=>'POST','class'=>'form-group','id'=>'adminLoginForm')) !!}                            <fieldset>
                        <div class="form-group">
                            {!! Form :: label('Email')!!} <em class="str">*</em>
                            {!! Form::email('email', $value=null ,array('class'=>'form-control','placeholder'=>'Email Address')) !!}

                        </div>
                        <div class="form-group">
                            {!! Form :: label('Password')!!} <em class="str">*</em>
                            {!! Form:: password('password',array('class'=>'form-control','placeholder'=>'Password','id'=>'password'))!!}
                        </div>

                        <!-- Change this to a button or input when using this as a form -->
                        <div class="submit">
                            <input type="submit" value="Login" class="btn btn-primary">
                        </div>
                    </fieldset>
                {!! Form:: close() !!}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#adminLoginForm').validate({

                rules: {

                    email: {
                        required: true,
                        email: true
                    },

                    password:{
                        required: true,
                        minlength: 6

                    }
                }
            });
        });
    </script>
@endsection