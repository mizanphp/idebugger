
@extends('layouts.master')
@section('title','Signpu')

@section('content')

<section>
    <div class="top-heading">
        <h1 class="animated fadeInRight">SignUp Form</h1>
    </div>

    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>

    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <div class="organization">
                    <form method="POST" action="{{ url('uploadFile') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <input type="file" name="file">
                        </div>

                        <p>Date: <input type="text" id="datepicker"></p>


                        <div class="form-group">
                            <input type="submit">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection




































