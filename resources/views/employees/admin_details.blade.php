@extends('layouts.admin')
@section('title', 'Employ Details')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="page-header">Employees</h1>
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-hover valign">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Title</th>
                    <th>Information</th>

                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>1</td>
                    <td>Name : </td>
                    <td>{!!$employees->user->first_name!!}</td>
                </tr>
                    <?php
                    $profile=$employees->user->photo;
                    ?>
                <tr>
                    <td>2</td>
                    <td>Profile : </td>
                    <td>{!! Html::image("/uploads/auth/$profile","Profile",array('width'=>75,'height'=>60)) !!}</td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Location : </td>
                    <td>{!! $employees->user->address !!}</td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>Email : </td>
                    <td>{!! $employees->email !!}</td>
                </tr>

                <tr>
                    <td>5</td>
                    <td>Phone : </td>
                    <td>{!! $employees->user->phone!!}</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /#page-wrapper -->

@endsection