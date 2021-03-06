@extends('layouts.admin')
@section('title','Admin | Panal ')

@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-3">
                    <h3 class="">Designation List</h3>
                </div>
                <div class="col-md-3 top_space">

                    {!! Form::open(array('url'=>'/admin/designations','method'=>'GET')) !!}

                        <div class="input-group custom-search-form">
                                {!! Form::text('filter','',array('class'=>'form-control'))!!}
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                                </span>
                        </div>
                    {!! Form::close()!!}
                </div>
                <div class="col-md-2 top_space">
                    <div class="reset-button"><a class="btn btn-primary" href="#">Reset</a></div>
                </div>

                <div class="col-md-1 top_space">
                    <div>
                        {!! Html:: link('/admin/designations/create','Add New',array('class'=>'btn btn-primary')) !!}
                    </div>
                </div>


            </div><br>
            <!-- /.row -->

            <table class="table table-hover">
                <tbody>

                <tr>
                    <th>#Id</th>
                    <th><a class="asc" href="#">Name</a></th>
                    <th><a href="#">Status</a></th>
                    <th>Action</th>
                </tr>
                <?php $i=1;?>
                @foreach($designations as $designations)
                <tr>
                    <td>{!! $i !!} </td>
                    <td>{!! $designations->name !!}</td>
                    <td class="center"><div class="active"></div>&nbsp;{!! $designations->status !!}</td>
                    <td>
                        {!! Html::link("admin/designations/edit/$designations->id","Edit",array("class"=>"btn btn-success"))!!}&nbsp;&nbsp;

                        {!! Html::link("/admin/designations/delete/$designations->id","Delete",array("class"=>"btn btn-danger")) !!}
                    </td>
                </tr>
                <?php $i++;?>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /#page-wrapper -->
@endsection