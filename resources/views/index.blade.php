@extends('layouts.master')
@section('title','Idebugger | Home')

@section('content')
    <section>
        <div class="top-heading">
            <h1 class="animated fadeInRight">Professional Evaluation System</h1>
        </div>
        <div class="container">
            <div class="row">

                <div class="col-sm-10 col-sm-offset-1">
                    @if(Session :: has('message'))
                    <div class="alert {{Session::get('className')}}">
                        {{Session :: get('message')}}
                    </div>
                    @endif

                    <div class="organization">
                        <h2>Find the right employee</h2>
                    </div>
                    <div class="box input-width1">
                        {!! Form::open(array('url'=>'/','method'=>'GET','class'=>'form-group')) !!}


                        {!! Form :: select('country', $countries,
                        '--Select--',array('class'=>'form-control pull-left','placeholder'=>'Country')) !!}

                        {!! Form :: select('jobCategory',$jobsCategories,
                        '--Select--',array('class'=>'form-control pull-left','placeholder'=>'Category')) !!}

                        {!! Form :: select('designation',$designations,
                        '--Select--',array('class'=>'form-control pull-left','placeholder'=>'Designations')) !!}

                        {!! Form :: text('filter','',array('class'=>'form-control pull-left','placeholder'=>'Search..')) !!}

                        {!! Form::button('<span class="glyphicon glyphicon-search"></span>',$attribute=array('value'=>'submit','class'=>'btn pull-left','type'=>'submit')) !!}

                        {!! Form::close()!!}
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-10 col-sm-offset-1">

                    <div class="box-margin">
                        <div class="organization">
                            <h2>Find the right Organizations</h2>
                        </div>
                        <div class="box input-width2">
                            {!! Form::open(array('url'=>'/','method'=>'GET','class'=>'form-group')) !!}

                            {!! Form :: select('country', $countries,
                            '--Select--',array('class'=>'form-control pull-left','placeholder'=>'Country')) !!}

                            {!! Form :: select('jobCategory',$jobsCategories,
                            '--Select--',array('class'=>'form-control pull-left','placeholder'=>'Category')) !!}

                            {!! Form :: text('filter','',array('class'=>'form-control pull-left','placeholder'=>'Search..')) !!}

                            {!! Form::button('<span class="glyphicon glyphicon-search"></span>',$attribute=array('value'=>'submit','class'=>'btn pull-left','type'=>'submit')) !!}

                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>


            </div><br>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">

                    <div class="count">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="{{url('organizations')}}">
                                    <div class="org">
                                        <div class="border">
                                            <div class="counter-icon">
                                                <i class="icon-live">ORG</i>
                                            </div>
                                        </div>
                                        <h4>Organizations</h4>
                                        <p class="amount">{{ number_format( $totalOrg )}}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="{{url('/employees')}}">
                                    <div class="org">
                                        <div class="border">
                                            <div class="counter-icon">
                                                <i class="icon-live">EMP</i>
                                            </div>

                                        </div>
                                        <h4>Employees</h4>
                                        <p class="amount">{{ number_format($totalEmp) }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="javascript:void(0)">
                                    <div class="org">
                                        <div class="border">
                                            <div class="counter-icon">
                                                <i class="icon-live">USR</i>
                                            </div>

                                        </div>
                                        <h4>Users</h4>
                                        <p class="amount">{{ number_format($totalUsers) }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
