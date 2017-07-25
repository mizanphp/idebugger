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
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                            {!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}

                            <div class="form-group">
                                {!! Form::label('Your Name') !!}
                                {!! Form::text('name', null,
                                array('required',
                                'class'=>'form-control',
                                'placeholder'=>'Your name')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Your E-mail Address') !!}
                                {!! Form::text('email', null,
                                array('required',
                                'class'=>'form-control',
                                'placeholder'=>'Your e-mail address')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Your Message') !!}
                                {!! Form::textarea('message', null,
                                array('required',
                                'class'=>'form-control',
                                'placeholder'=>'Your message')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Contact Us!',
                                array('class'=>'btn btn-primary')) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection