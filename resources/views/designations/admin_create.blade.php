@extends('layouts.admin')
@section('title','Admin | Panal ')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="">Designations Create</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="">
        {!! Form::open(array('url'=>'/admin/designations/store','method'=>'POST','id'=>'designationsForm')) !!}
            <div class="form-group">
                {!! Form :: label('Name') !!}<em>*</em>
                {!! Form :: text('name','',array('class'=>'form-control'))!!}
            </div>

            <div class="form-group">
                {!! Form::checkbox('status', 1, true) !!}
                {!! Form :: label('Status') !!}
            </div>

            <div class="form-group">
                {!! Form :: submit('Save',array('class'=>'btn btn-primary')) !!}
            </div>
        {!! Form::close() !!}

    </div>

</div>

<script type="text/javascript">
    jQuery(document).ready(function(){

        jQuery('#designationsForm').validate({

            rules: {
                name: "required"

            }

        });
    });
</script>

<!-- /#page-wrapper -->
@endsection