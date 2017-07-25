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
                    <div class="box input-width" style="color:#fff;">
                        <h2>{!! $employees[0]->name !!}</h2>
                        <p>Employees</p>
                    </div>

                    <?php //echo '<pre>'; print_r($employees); ?>


                    <div class="employee-list">
                        <table>
                            <thead>
                            <tr>
                                <th class="id">id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Email</th>
                                <th colspan="2">Details</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $i=1 ?>
                            @foreach($employees as $employee)
                            <tr>
                                <td class="id">{!! $i !!}</td>
                                <td class="">{!! $employee->first_name.' '. $employee->last_name !!}</td>
                                <td class="">{!! $employee->phone !!}</td>
                                <td class="">{!! $employee->job_location !!}</td>
                                <td class="">{!! $employee->user_name !!}</td>
                                <td class=""><a href="{{ route('employees.show',$employee->emp_id)}}">View</a></td>
                                @if($employee->is_approve==1)
                                    <td class=""><a href="javascript:void(0)" title="Approved"><i class="fa fa-check-square" aria-hidden="true"></i>
                                        </a></td>
                                @else
                                    <td class=""><a href="#" title="Requested"><i class="fa fa-minus-square" aria-hidden="true"></i>
                                        </a></td>
                                @endif
                            </tr>
                            <?php $i++ ?>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection