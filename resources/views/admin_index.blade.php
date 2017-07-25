@extends('layouts.admin')
@section('title','Admin | Panal ')

@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="dashboard-container-quick-icon">
                    <div class="quick-icon">
                        <div class="icon">
                            <a href="{{url('admin/auth')}}">
                                {!! Html :: image("/images/dashboards/user.png","Users Icon",array('height'=>48,'width'=>48)) !!}<span>Users</span>
                            </a>
                        </div>

                        <div class="icon">
                            <a href="{{url('/admin/employees')}}">
                                {!! Html :: image("images/dashboards/employee.png","Employee Icon",array('height'=>48,'width'=>48)) !!}<span>Employees</span>
                            </a>
                        </div>
                        <div class="icon">
                            <a href="{!! url('/admin/organizations') !!}">
                                {!! Html :: image("images/dashboards/organizations.png","Organization Icon",array('height'=>48,'width'=>48)) !!} <span>Organizations</span>
                            </a>
                        </div>
                        <div class="icon">
                            <a href="{{url('/admin/designations')}}">
                                {!! Html :: image("images/dashboards/designations.png","iCON",array('height'=>48,'width'=>48)) !!} <span>Designation</span>
                            </a>
                        </div>
                        <div class="icon">
                            <a href="{{url('/admin/jobscategories')}}">
                                {!! Html :: image("images/dashboards/category.png","ICON",array('height'=>48,'width'=>48)) !!} <span>Job Category</span>
                            </a>
                        </div>



                    </div>
                </div>

            </div>

        </div>
        <!-- /#page-wrapper -->
@endsection