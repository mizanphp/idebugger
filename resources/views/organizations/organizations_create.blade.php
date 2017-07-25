
@extends('layouts.master')
@section('title','Orgaization Create')

@section('content')

<section>
    <div class="top-heading">
        <h1 class="animated fadeInRight">Organization</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-1">
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="organization">
                    <h2>Organization</h2>

                    {!! Form::open(array('url' => 'organizations/store','method'=>'POST','files'=>true ,'class'=>'form-group','id'=>'OrganizationCreateForm')) !!}

                        <div class="form-group">
                            {!! Form::label('Name')!!} <em >*</em>
                            {!! Form::text('name',$value=null, array('class'=>'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Logo')!!} <em >*</em>
                            {!! Form::file('logo',array('class'=>'file')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form :: label('Jobs Categories')!!} <em >*</em>
                            {!! Form :: select('jobcategory', $jobsCategories,
                            '--Select--',array('class'=>'form-control','placeholder'=>'--Select--')) !!}
                        </div>

                        <div class="form-group">
                           {!! Form::label('Phone') !!} <em >*</em>
                           {!! Form::text('phone',$value=null,array('class'=>'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Address')!!} <em >*</em>
                            {!! Form::text('address',$value=null, array('class'=>'form-control map-show','id'=>'addresspicker_map')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Sub Locality')!!} <em >*</em>
                            {!! Form::text('sublocality',$value=null, array('class'=>'form-control','id'=>'sublocality')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('District')!!} <em >*</em>
                            {!! Form::text('district',$value=null, array('class'=>'form-control','id'=>'administrative_area_level_2')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('State/Province')!!} <em >*</em>
                            {!! Form::text('division',$value=null, array('class'=>'form-control','id'=>'administrative_area_level_1')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Postal Code')!!} <em >*</em>
                            {!! Form::text('postal_code',$value=null, array('class'=>'form-control','id'=>'postal_code')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form :: label('Country')!!} <em >*</em>
                            {!! Form :: select('country', $countries,
                            '--Select--',array('class'=>'form-control','placeholder'=>'--Select--')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::hidden('lat',$value=null, array('class'=>'form-control','id'=>'lat')) !!}
                            {!! Form::hidden('lng',$value=null, array('class'=>'form-control','id'=>'lng')) !!}
                        </div>

                        <div class="form-group">

                            {!! Form::label('E-mail') !!} <em >*</em>
                            {!! Form::email('email',$value=old('email'), $attributes = array('class'=>'form-control','id'=>'UserEmail')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Descriptions') !!}
                            {!! Form::textarea('descriptions',$value=null,array('class'=>'form-control'))!!}
                        </div>



                        <div class="login">
                            {!! Form::submit('Submit', array('class'=>'btn btn-success pull-right')) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="col-sm-3">
                <div class='map-wrapper'>
                    <label id="geo_label" for="reverseGeocode">Reverse Geocode after Marker Drag?</label>
                    <select id="reverseGeocode">
                        <option value="false" selected>No</option>
                        <option value="true">Yes</option>
                    </select><br/>

                    <div id="map"></div>
                    <div id="legend">You can drag and drop the marker to the correct location</div>
                </div>

            </div>

        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function(){
        var BASE_URL='http://localhost/idebugger/public/';

        jQuery('#OrganizationCreateForm').validate({

            rules: {
                name: "required",
                jobcategory: "required",
                country: "required",
                phone: "required",
                descriptions: "required",
                address: "required",
                logo: "required",

                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: BASE_URL+'organizations/email',
                        type: "get",
                        data: {
                            email: function(){ return jQuery("#UserEmail").val(); }
                        }
                    }
                }

                /*email: {
                    required: true,
                    email: true
                }*/
            },
            messages: {
                name: "Please enter your Name",
                phone: "Please enter your Phone",
                descriptions: "Please enter your Descriptions",
                address: "Please enter your Address",
                logo: "Please enter your Logo",
                email: {
                    remote: 'Email already used.'
                }

            }

        });
    });
</script>
@endsection




































