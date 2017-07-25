@extends('layouts.master')
@section('title', 'Login')

@section('content')
<section>
    <div class="top-heading">
        <h1 class="animated fadeInRight">Login</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="organization">
                    <h2>Login</h2>
                    {!! Form::open(array('url'=>'/auth/login','method'=>'POST','class'=>'form-group','id'=>'loginForm')) !!}
                        <div class="form-group">
                            {!! Form::label('User Name') !!}<em>*</em>
                            {!! Form::email('email', $value=null ,array('class'=>'form-control','placeholder'=>'Email Address')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Password') !!}<em>*</em>
                            {!! Form:: password('password',array('class'=>'form-control','placeholder'=>'Password','id'=>'password'))!!}
                        </div>

                        <div class="login">
                            {!! Form::button('Login',array('class'=>'btn btn-success','type'=>'submit')) !!}
                        </div>
                    {!! Form:: close() !!}
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#loginForm').validate({

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























<!--<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>-->