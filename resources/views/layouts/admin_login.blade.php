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

    <!-- Custom CSS -->
    {!! Html :: style("css/sb-admin-2.css") !!}

    <!-- Custom Fonts -->
    {!! Html :: style("font-awesome-4.1.0/css/font-awesome.min.css") !!}

    <!-- jQuery Version 1.11.0 -->
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

    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>



    <!-- Bootstrap Core JavaScript -->
    {!! Html :: script("js/bootstrap.min.js") !!}

    <!-- Metis Menu Plugin JavaScript -->
    {!! Html :: script("js/plugins/metisMenu/metisMenu.min.js") !!}

    <!-- Custom Theme JavaScript -->
    {!! Html :: script("js/sb-admin-2.js") !!}

</body>

</html>
