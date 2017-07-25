@extends('layouts.admin')
@section('title','Admin | Panal ')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="">Jobs Categories Create</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div>
        {!! Form::open(array("url"=>"/admin/jobscategories/update/$jobCategory->id",'method'=>'POST')) !!}
            <div class="form-group">
                {!! Form :: label('Name') !!}<em>*</em>
                {!! Form :: text('name',$value="$jobCategory->name",array('class'=>'form-control'))!!}
            </div>

            <div class="form-group">
                {!! Form::checkbox('status', $value="$jobCategory->status", true) !!}
                {!! Form :: label('Status') !!}
            </div>

            <div class="form-group">
                {!! Form :: submit('Save',array('class'=>'btn btn-primary')) !!}
            </div>
        {!! Form::close() !!}

    </div>

</div>
<!-- /#page-wrapper -->
@endsection