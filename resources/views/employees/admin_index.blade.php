@extends('layouts.admin')
@section('title','Admin | Employee ')

@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-3">
                    <h3 class="">Employee List</h3>
                </div>
                <div class="col-md-3 top_space">
                    {!! Form:: open(array('url'=>'/admin/employees','method'=>'GET')) !!}
                        <div class="input-group custom-search-form">
                            {!! Form::text('filter','',array('class'=>'form-control')) !!}
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div><br>
            <!-- /.row -->
            <div class="row">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>

                        <?php $i=1;?>

                        @foreach($employees as $employee)

                        <tr>
                            <td>{!! $i !!}</td>
                            <td>{!! $employee->user->first_name !!}</td>
                            <td>{!! $employee->user->phone !!}</td>
                            <td>{!! $employee->user->address !!}</td>
                            <td>{!! $employee->user->email !!}</td>

                            <td>{!! Html :: link( "/admin/employees/details/$employee->id","Details")!!}</td>
                        </tr>
                        <?php $i++;?>
                        @endforeach
                    </tbody>
                </table>


            </div>

        </div>
        <!-- /#page-wrapper -->
@endsection