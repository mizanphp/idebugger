@extends('layouts.admin')
@section('title','Admin | Organizations ')

@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-3">
                    <h3 class="">Organizations</h3>
                </div>
                <div class="col-md-3 top_space">
                    {!! Form::open(array('url'=>'/admin/organizations','method'=>'GET')) !!}
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
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Location</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>

                        <?php $i=1;?>

                        @foreach($organizations as $organization)
                        <tr>
                            <td>{!! $i !!}</td>
                            <td>{!! $organization->name !!}</td>
                            <td>{!! Html :: image("/uploads/logo/$organization->logo","Logo",array('height'=>60,'width'=>75)) !!}</td>
                            <td>{!! $organization->address !!}</td>
                            <td>{!! $organization->email !!}</td>
                            <td><a href="{{ url('admin/organizations/details',$organization->id)}}">Details</a></td>
                        </tr>
                        <?php $i++;?>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /#page-wrapper -->
@endsection