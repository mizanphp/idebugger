<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <title>@yield('title')</title>

    {!! Html::style('css/font-awesome.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/demo.css') !!}
    {!! Html::style('css/animate.min.css') !!}
    {!! Html::style('css/jquery-ui.css') !!}
    {!! Html::style('css/jquery.rateyo.css') !!}

    {!! Html:: script('js/jquery-1.11.1.min.js') !!}
    {!! Html:: script('js/jquery-1.10.2.js') !!}
    {!! Html:: script('js/jquery.rateyo.js') !!}
    {!! Html:: script('js/jquery.validate.js') !!}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="icon" href="images/favicon.ico">

</head>
<body>
    <header class="l-header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false">
                        <span calss="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand" >
                        {!! Html::link("/","iDebugger",array("id"=>"logo")) !!}
                    </div>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav main-nav">
                        <li class="active">{!! Html::link('/', 'Home') !!}</li>
                        <li>{!! Html::link('/employees','Employees') !!}</li>
                        <li>{!! Html::link('/organizations','Organizations') !!}</li>
                        <li>{!! Html::link('/contact','Contact Us') !!}</li>

                    </ul>

                    <ul class="nav navbar-nav action-nav navbar-right">
                        @if(Auth::user())
                        <?php
                        $email=Auth::user()->email;
                        ?>
                            <li><span><?php echo "Welcome $email"; ?></span></li>
                            <li>{!! Html::link("/auth/logout","Logout") !!}</li>

                        @else
                            <li>{!! Html::link('/auth/login','Login') !!}</li>
                            <li>{!! Html::link('/auth/register','Singup') !!}</li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    </header>

@yield('content')

    <footer>
        <div class="panel-footer footer footer-fixed">
            <span>iDebugger Copyright &copy {!! date('Y') !!}</span>
        </div>
    </footer>

    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>


    {!! Html:: script('js/bootstrap.min.js') !!}
    {!! Html:: script('js/jquery-ui.js') !!}
    {!! Html:: script('js/jquery.ui.addresspicker.js') !!}
    {!! Html:: script('js/custom.js') !!}


    <!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>-->


    <script type="text/javascript">
        $(function() {
            $( ".datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });

        });
    </script>


    <script>
        $(function () {
            $("#rateYo").rateYo({
                onChange: function (rating, rateYoInstance) {
                    $(this).next().val(rating);
                },
                rating: 0,
                numStars: 5,
                fullStar: true
            });
        });
    </script>










    <script>
        $(function() {
            /*var addresspicker = $( "#addresspicker" ).addresspicker({
             componentsFilter: 'country:AU'
             });*/
            var addresspickerMap = $( "#addresspicker_map" ).addresspicker({
                //regionBias: "fr",
                //language: "fr",
                /*updateCallback: showCallback,
                 mapOptions: {
                 zoom: 4,
                 center: new google.maps.LatLng(46, 2),
                 scrollwheel: false,
                 mapTypeId: google.maps.MapTypeId.ROADMAP
                 },*/
                elements: {
                    map:      "#map",
                    lat:      "#lat",
                    lng:      "#lng",
                    street_number: '#street_number',
                    route: '#route',
                    locality: '#locality',
                    sublocality: '#sublocality',
                    administrative_area_level_3: '#administrative_area_level_3',
                    administrative_area_level_2: '#administrative_area_level_2',
                    administrative_area_level_1: '#administrative_area_level_1',
                    country:  '#country',
                    postal_code: '#postal_code',
                    type:    '#type'
                }
            });

            var gmarker = addresspickerMap.addresspicker( "marker");
            gmarker.setVisible(true);
            addresspickerMap.addresspicker( "updatePosition");

            $('#reverseGeocode').change(function(){
                $("#addresspicker_map").addresspicker("option", "reverseGeocode", ($(this).val() === 'true'));
            });

            function showCallback(geocodeResult, parsedGeocodeResult){
                $('#callback_result').text(JSON.stringify(parsedGeocodeResult, null, 4));
            }
            // Update zoom field
            var map = $("#addresspicker_map").addresspicker("map");
            google.maps.event.addListener(map, 'idle', function(){
                $('#zoom').val(map.getZoom());
            });

        });
    </script>


<!--<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>-->

<script>
    function myDashboard() {
        document.getElementById("dashboard").style.WebkitAnimationName = "myNEWmove"; // Code for Chrome, Safari, and Opera
        document.getElementById("dashboard").style.animationName = "myNEWmove";
    }
</script>

</body>
</html>