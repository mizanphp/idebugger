@extends('layouts.master')
@section('title', 'Employ Details')

@section('content')
        <section>
            <div class="top-heading">
                <h1 class="animated fadeInRight">Employee</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">

                        <div class="back">
                            <a class="btn btn-default" href="{{ URL::previous() }}">Go Back</a>
                        </div>
                        <div class="box employee-details-header">
                            <?php
                                $employee_id=$employees->id;
                                $organization_id=$employees->organizations->id;

                            ?>
                            <div class="box1">
                                <h4>{!! $employees->user->first_name .' '.$employees->user->last_name !!}</h4>

                            </div>

                           <!-- <div class="box2">

                            </div>-->

                            <div class="box3">
                                {!! Html::image('/images/spr/mail.png','Icon')!!}
                                <h4>{!! $employees->user->email!!}</h4>
                            </div>

                            <div class="box4">
                                {!! Html::image('/images/spr/phone.png','Icon') !!}
                                <h4>{!! $employees->user->phone!!}</h4>
                            </div>
                        </div>

                        <div class="employee-details">
                            <div class="row employee-block">
                                <div class="col-sm-6">
                                    @if($is_enable_feedback_btn)
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    {!! Html::link("feedbacks/feedback_create?employee_id=$employee_id&organization_id=$organization_id","Feedback")!!}
                                    @endif
                                </div>

                                <div class="col-sm-6 text-right"> </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="profile">
                                        <h2>Profile</h2>
                                    </div>
                                </div>

                                <div class="col-sm-9">
                                    <div class="profile-image">
                                        {!! Html :: image ('/uploads/auth/'.$employees->user->photo.'','Profile',array('class'=>'rejaul')) !!}

                                        <strong>{!! $employees->user->first_name. " ". $employees->user->last_name !!}</strong>
                                        <h3>Expart(E-commarcc,API,Scrapping,</br>Magento,cs-cart,PHP,MySql)</h3>
                                        <div class="profile-dhaka">
                                            {!! Html::image('/images/spr/address.png','Icon') !!}
                                            <h3>{!! $employees->job_location!!}</h3>
                                        </div>

                                        <div class="profile-menu">
                                            <ul>
                                                <li><a href="#">PHP</a></li>
                                                <li><a href="#">MySQL Administration</a></li>
                                                <li><a href="#">jQuery</a></li>
                                                <li><a href="#">jQuery Mobile</a></li>
                                                <li><a href="#">HTML</a></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="profile-image pull-right">
                                        <h1>${!! $employees->salary !!}/Month</h1>
                                        <div id='rating'></div>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="overview-paragraph">
                                        <h2>Overview</h2>
                                        <p>
                                            {!! $employees->overview !!}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="miguel-diaz">

                                    </div>

                                    <div class="overview-paragraph">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="work-history">
                                                    <h2>Work History and Feedback</h2>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!--<div class="dropdown">
                                                    <select class="pull-right">
                                                        <option>Newest first</option>
                                                        <option>Highest rated</option>
                                                        <option>Lowest rated</option>
                                                        <option>Largest projects</option>
                                                    </select>
                                                </div>-->
                                            </div>
                                        </div>
                                        <div class="border-bottom"></div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php
                                                    $count=$feedbacks->count();
                                                    $total=0;
                                                ?>
                                                <div class="jobs-in-progress">
                                                    <i class="fa fa-angle-down fa-2x"></i> {!! $count !!} Jobs Completed
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-bottom"></div>
                                        @foreach($feedbacks as $feedback)

                                            <div class="row padding-top-bottom">
                                                <div class="col-sm-12">
                                                    <div class="chrome-extension">

                                                        <div class="date">

                                                            <p>{!! $feedback->created_at !!} - Present</p>
                                                        </div>
                                                        <p>{!! $feedback->message !!}</p>
                                                        <p><i>Job in progress</i></p>

                                                    </div>
                                                </div>

                                            </div>
                                            <?php
                                                $rating=$feedback->rating_feedback;
                                                $total+=$rating;
                                            ?>
                                            <div class="border-bottom"></div>

                                        @endforeach

                                        <?php
                                            if($count!=0) {
                                                $total;
                                                $average=$total/$count;
                                            }else{
                                                $average=0;
                                            }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            $(function () {
                var limit='<?php echo $average ?>';
                $("#rating").rateYo({

                    rating: limit,
                    numStars: 5,
                    fullStar: true,
                    starWidth: "18px",
                    //normalFill: "#00ff00",
                    readOnly: true

                });
            });
        </script>


@endsection
