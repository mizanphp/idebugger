@extends('layouts.admin')
@section('title', 'Organizations Details')

@section('content')
<div id="page-wrapper">
    <div class="row page-header-won">
        <div class="col-md-4">
            <h3 class="">Organization Details</h3>
        </div>
        <div class="col-md-2">
            {!! Html::link("/admin/organizations","Back",array('class'=>'btn btn-primary top_space')) !!}
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <h2>Name : {!!$organizations->name!!}</h2>
            <h3>Logo :</h3><br>
            <div class="admin-logo">{!! Html :: image("uploads/logo/$organizations->logo","Logo",array('width'=>100,'height'=>100)) !!}</div>
            <br>
            <div><b>Email :</b> {!! $organizations->email !!}</div>
            <div><b>Phone :</b>{!! $organizations->phone !!}</div>
            <div><b>Locations :</b> {!! $organizations->address !!}</div>
            <div><b>Country :</b>{!! $organizations->country !!}</div>
            <div><b>Sub Locality :</b>{!! $organizations->sublocality !!}</div>
            <div><b>District :</b>{!! $organizations->district !!}</div>
            <div><b>Descriptions :</b></div>
            <div>{!! $organizations->descriptions !!}</div>
        </div>
    </div>

</div>
<!-- /#page-wrapper -->

@endsection