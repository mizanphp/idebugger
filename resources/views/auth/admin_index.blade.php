
@extends('layouts.admin')
@section('title','Admin | Organizations ')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-3">
                <h3 class="">Users</h3>
            </div>
            <div class="col-md-3 top_space">
                {!! Form::open(array('url'=>'/admin/auth','method'=>'GET')) !!}
                <div class="input-group custom-search-form">
                    {!! Form::text('filter','', array('class'=>'form-control'))!!}
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
                    <th>#id</th>
                    <th>First Name</th>
                    <th>Photos</th>
                    <th>Location</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

                <?php $i=1;?>

                @foreach($users as $user)
                <tr>
                    <td>{!! $i !!}</td>
                    <td>{!! $user->first_name !!}  {!! $user->last_name !!}</td>
                    <td>{!! Html :: image("/uploads/auth/$user->photo","Profile Photo",array('height'=>60,'width'=>75)) !!}</td>
                    <td>{!! $user->address !!}</td>
                    <td>{!! $user->email !!}</td>
                    <td><a href="{{ url('admin/auth/details',$user->id)}}">Details</a></td>
                </tr>
                <?php $i++;?>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
<!-- /#page-wrapper -->
@endsection