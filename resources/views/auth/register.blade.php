
@extends('layouts.master')
@section('title','Signup')

@section('content')

<section>
    <div class="top-heading">
        <h1 class="animated fadeInRight">Signup</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-1">

                <?php
/*                    echo "<pre>";
                        print_r($country);
                    echo "</pre>";

                */?>
                <div class="organization">
                    <h2>Signup</h2>

                    {!! Form::open(array('url' => 'auth/register','files'=>true,'method'=>'POST','class'=>'form-group','id'=>'RegistrationForm')) !!}

                        <div class="form-group">
                            {!! Form::label('First Name')!!} <em >*</em>
                            {!! Form::text('first_name',$value=null, array('class'=>'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Last Name')!!} <em >*</em>
                            {!! Form::text('last_name',$value=null, array('class'=>'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Phone') !!} <em >*</em>
                            {!! Form::text('phone',$value=null,array('class'=>'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Address')!!} <em >*</em>
                            {!! Form::text('address',$value=null, array('class'=>'form-control','id'=>'addresspicker_map')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Sub Locality')!!}
                            {!! Form::text('sublocality',$value=null, array('class'=>'form-control','id'=>'sublocality')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('District')!!}
                            {!! Form::text('district',$value=null, array('class'=>'form-control','id'=>'administrative_area_level_2')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('State/Province')!!}
                            {!! Form::text('division',$value=null, array('class'=>'form-control','id'=>'administrative_area_level_1')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Postal Code')!!} <em >*</em>
                            {!! Form::text('postal_code',$value=null, array('class'=>'form-control','id'=>'postal_code')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form :: select('country', $countries,
                            '--Select--',array('class'=>'form-control pull-left','placeholder'=>'Country')) !!}
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
                            {!! Form::label('Password')!!} <em >*</em>
                            {!! Form::password('password', $attributes = array('class'=>'form-control','placeholder'=>'Password','id'=>'UserPassword')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Confirm Password')!!} <em >*</em>
                            {!! Form::password('password_confirmation', $attributes = array('class'=>'form-control','placeholder'=>'Conform Password')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Photo')!!} <em >*</em>
                            {!! Form::file('photo',array('class'=>'file')) !!}
                        </div>

                        <div class="login">
                            {!! Form::submit('SignUp', array('class'=>'btn btn-success pull-right')) !!}
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
        var BASE_URL='http://localhost/idebugger/';
        jQuery('#RegistrationForm').validate({

            rules: {
                first_name: "required",
                last_name: "required",
                phone: "required",
                address: "required",
                photo: "required",

                email: {
                    required:true,
                    email:true,
                    remote: {
                        url: BASE_URL+'organizations/email',
                        type: "get",
                        data: {
                            email: function(){ return jQuery("#UserEmail").val(); }
                        }
                    }
                },
                /*email: {
                    required: true,
                    email: true
                },*/

                password:{
                    required: true,
                    minlength: 6

                },

                password_confirmation: {
                    required:true,
                    minlength:6,
                    equalTo: '#UserPassword'

                }
            },
            messages: {
                email: {
                    remote: 'Email already used.'
                }
            }

        });
    });
</script>
@endsection




































