@extends('layouts.master')
@section('title', 'Idebugger | Employ List')

@section('content')
    <section>
        <div class="top-heading">
            <h1 class="animated fadeInRight">Employees</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <div class="back">
                        <a class="btn btn-default" href="{{ URL::previous() }}">Go Back</a>
                    </div>

                    <div class="employ-list">

                        <div class="box input-width">
                            {!! Form::open(array('url'=>'/employees','method'=>'GET','class'=>'form-group')) !!}

                            {!! Form :: text('filter','',array('class'=>'form-control pull-left','placeholder'=>'Search..')) !!}

                            {!! Form::button('<span class="glyphicon glyphicon-search"></span>',$attribute=array('value'=>'submit','class'=>'btn pull-left','type'=>'submit')) !!}

                            {!! Form::close()!!}
                        </div>

                        <div class="employee-list">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="id">id</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Location</th>
                                        <th>Email</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php $i=1 ?>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td class="id">{!! $i !!}</td>
                                        <td class="">{!! $employee->user->first_name.' '. $employee->user->last_name !!}</td>
                                        <td class="">{!! $employee->user->phone !!}</td>
                                        <td class="">{!! $employee->job_location !!}</td>
                                        <td class="">{!! $employee->user->email !!}</td>
                                        <!--<td class=""><a href="/employ_details" class="btn">View</a></td>-->
                    <td class=""><a href="{{ route('employees.show',$employee->id)}}">View</a></td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach

                    </tbody>
                    </table>
                    {!! $employees->render() !!}

                    @if(Session :: has('message'))
                    <div class="alert {{Session::get('className')}}">
                        {{Session :: get('message')}}
                    </div>
                    @endif

                </div>
            </div>
                </div>
            </div>
        </div>
    </section>
@endsection