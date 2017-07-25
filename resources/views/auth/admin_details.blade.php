@extends('layouts.admin')
@section('title', 'Organizations Details')

@section('content')
<div id="page-wrapper">
    <div class="row page-header-won">
        <div class="col-md-4">
            <h3 class="">User Details</h3>

        </div>
        <div class="col-md-2">
            {!! Html::link("/admin/auth","Back",array('class'=>'btn btn-primary top_space')) !!}
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <h2>Name : {!!$user->first_name!!}</h2>
            <h3>Photo :</h3><br>
            <div class="admin-logo">{!! Html :: image("uploads/auth/$user->photo","Profile",array('width'=>100,'height'=>100)) !!}</div>
            <br>
            <div><b>Email :</b> {!! $user->email !!}</div>
            <div><b>Phone :</b>{!! $user->phone !!}</div>
            <div><b>Locations :</b> {!! $user->address !!}</div>
            <div><b>Country :</b>{!! $user->country !!}</div>
            <div><b>Sub Locality :</b>{!! $user->sublocality !!}</div>
            <div><b>District :</b>{!! $user->district !!}</div>
            <div>{!! $user->descriptions !!}</div>
        </div>
    </div>

</div>
<!-- /#page-wrapper -->

@endsection