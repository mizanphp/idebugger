<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    {!! Html :: style("css/bootstrap.min.css") !!}

    <!-- MetisMenu CSS -->
    {!! Html :: style("css/plugins/metisMenu/metisMenu.min.css") !!}

    <!-- Timeline CSS -->
    {!! Html :: style("css/plugins/timeline.css") !!}

    <!-- Custom CSS -->
    {!! Html :: style("css/sb-admin-2.css") !!}
    {!! Html :: style("css/admin_custom.css") !!}

    <!-- Morris Charts CSS -->
    {!! Html :: style("css/plugins/morris.css") !!}

    <!-- Custom Fonts -->
    {!! Html :: style("font-awesome-4.1.0/css/font-awesome.min.css") !!}




    {!! Html :: script("js/jquery-1.11.0.js") !!}

    {!! Html :: script("js/jquery.validate.js") !!}


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {!! Html :: link('/','Idebugger',array('class'=>'navbar-brand')) !!}
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>

                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/auth/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                           <!-- <a class="active" href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>-->
                            {!! Html::link("/admin/dashboard","Dashboard")!!}
                        </li>

                       <li>
                           <!-- <a class="active" href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>-->
                            {!! Html::link("/admin/auth","Users")!!}
                        </li>


                        <li>
                            <!--<a href="#"><i class="fa fa-wrench fa-fw"></i> Users<span class="fa arrow"></span></a>-->

                        </li>
                         <li>
                            <!--<a href="/admin/employees"><i class="fa fa-wrench fa-fw"></i> Employees<span class="fa arrow"></span></a>-->
                             {!! Html::link("/admin/employees","Employees") !!}
                        </li>
                         <li>
                            <!--<a href="/admin/organizations"><i class="fa fa-wrench fa-fw"></i> Organizations<span class="fa arrow"></span></a>-->
                             {!! Html::link("/admin/organizations","Organizations") !!}
                        </li>
                         <li>
                            <!--<a href="/admin/designations"><i class="fa fa-wrench fa-fw"></i>Designations<span class="fa arrow"></span></a>-->
                             {!! Html::link("/admin/designations","Designations") !!}

                        </li>

                        <li>
                            <!--<a href="/admin/jobsCategories"><i class="fa fa-wrench fa-fw"></i>Jobs Categories<span class="fa arrow"></span></a>-->
                            {!! Html::link("/admin/jobscategories","Jobs Categories") !!}
                        </li>


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


        @yield('content')

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->


    <!-- Bootstrap Core JavaScript -->
    {!! Html :: script("js/bootstrap.min.js") !!}
    <!-- Metis Menu Plugin JavaScript -->
    {!! Html :: script("js/plugins/metisMenu/metisMenu.min.js") !!}

    <!-- Morris Charts JavaScript -->
    {!! Html :: script("js/plugins/morris/raphael.min.js") !!}
    {!! Html :: script("js/plugins/morris/morris.min.js") !!}
    {!! Html :: script("js/plugins/morris/morris-data.js") !!}

    <!-- Custom Theme JavaScript -->
    {!! Html :: script("js/sb-admin-2.js") !!}

</body>

</html>
