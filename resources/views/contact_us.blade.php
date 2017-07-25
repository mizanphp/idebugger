    @extends('layouts.master')
    @section('title', 'Idebugger | Contact us ')

    @section('content')
        <section>
            <div class="top-heading">
                <h1 class="animated fadeInRight">Contact Us</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="organization contactus">
                            <h2>Contact Us</h2>
                            {!! Form::open()!!}

                                {!! Form::label('E-mail')!!}<em>*</em>
                                {!! Form::text('email' ,null, array('class'=>'form-control','placeholder'=>'Email....'))!!}

                                {!! Form::label('Subject') !!}<em>*</em>
                                {!! Form::text('subject',$value=null,$attribute=array('class'=>'form-control','placeholder'=>'subject')) !!}

                                {!! Form::label('Massage')!!}<em>*</em>
                                {!! Form::textarea('massage', $value=null, $attributes=array('class'=>'form-control')) !!}

                                <div class="login">
                                    {!! Form::button(' sut <span class="glyphicon glyphicon-search"></span>',$attribute=array('value'=>'submit','class'=>'btn btn-success','type'=>'submit')) !!}
                                </div>
                            {!! form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection