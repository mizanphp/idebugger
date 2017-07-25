@extends('layouts.master')
@section('title', 'Employ Details')

@section('content')

    <section>
        <div class="top-heading">
            <h1 class="animated fadeInRight">Organization</h1>

        </div>

        <div class="container">


            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="back">
                        <a class="btn btn-default" href="{{ URL::previous() }}">Go Back</a>
                    </div>
                    <div class="box employee-details-header organization-details-header">
                        <div class="box1">
                            <h4>{!! $organizations->name !!}</h4>
                            <p>IT/Software</p>
                        </div>
                        <div class="box3">
                            {!! Html :: image ('/images/spr/mail.png','Email') !!}
                            <h4>{!! $organizations->email!!}</h4>
                        </div>

                        <div class="box4">
                            {!! Html :: image ('/images/spr/phone.png','Phone') !!}
                            <h4>{!! $organizations->phone !!}</h4>
                        </div>
                    </div>

                    @if(Session :: has('message'))
                    <div class="alert {{Session::get('className')}}">
                        {{Session :: get('message')}}
                    </div>
                    @endif

                    <div class="employee-details organization-details">
                        <div class="row employee-block">
                            <div class="col-sm-6">
                                <?php
                                    if(Auth::check() and $employee)
                                        $employee_id = $employee->id;
                                ?>
                                @if(!$is_show_feedback_btn)
                                    <i class="fa fa-plus"></i>
                                    @if($is_assign_a_job)
                                        {!! Html :: link("/employees/create/$organizations->id","Create Employee")!!}
                                    @else
                                    {!! Html :: link("/employees/create/$organizations->id","Join")!!}
                                    @endif

                                @endif

                                @if($is_show_feedback_btn)
                                <i class="fa fa-comments" aria-hidden="true"></i>
                                {!! Html :: link("/feedbacks/feedbackorg?organization_id=$organizations->id&employee_id=$employee_id","Feedback")!!}
                                @endif
                                <i class="fa fa-users" aria-hidden="true"></i>
                                {!! Html :: link("/employees/organization_employees/$organizations->id","Employees")!!}
                            </div>

                            <div class="col-sm-6 text-right"></div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="organizationh2">
                                    <h2>{!! $organizations->name !!}</h2>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <ul>
                                    <li>
                                        {!! Html :: image ("uploads/logo/$organizations->logo","LOGO")!!}
                                    </li>
                                    <li class="rating-custom"><span id="ratingOrg"></span></li>
                                </ul>
                            </div>

                            <div class="col-sm-8">

                                <ul>
                                    <div class="contact">Contact</div>
                                    <li><span>Phone</span><b class="estu">:</b>{!! $organizations->phone !!}</li>
                                    <li><span>E-mail</span><b class="estu">:</b>{!! $organizations->email!!}</li>
                                    <li><span>Address</span><b class="estu">:</b>{!! $organizations->address !!}</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-sm-offset-2">
                    <div class="overview-paragraph employee-details">
                        <h2>Overview</h2>
                        <p>
                            {!! $organizations->descriptions !!}

                        </p>
                    </div>
                </div>

                <div class="col-sm-8 col-sm-offset-2">
                    <div class="miguel-diaz">

                    </div>

                    <div class="overview-paragraph">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="work-history employee-details">
                                    <h2>Work History and Feedback</h2>
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                        </div>
                        <div class="border-bottom"></div>

                        <?php
                            $count=$feedbacks->count();
                            $total=0;
                        ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="jobs-in-progress">
                                    <i class="fa fa-angle-down fa-2x"></i> {!! $count !!} feedbacks
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom"></div>

                        @foreach($feedbacks as $feedback)

                            <div class="row padding-top-bottom">
                                <div class="col-sm-12">
                                    <div class="chrome-extension">

                                        <div class="date">
                                            <p> {!! $feedback->created_at !!}- Present</p>
                                        </div>
                                        <div><i aria-hidden="true" class="fa fa-user fa-6"></i></div>
                                        <p>{!! $feedback->message !!}</p>
                                        <p><i>Job in progress</i></p>
                                    </div>
                                </div>

                            </div>
                            <?php
                                $total+= $feedback->rating_feedback;
                            ?>
                            <div class="border-bottom"></div>

                        @endforeach

                        <?php

                            if($count!=0){
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
    </section>
<script>
    $(function () {
        var limit='<?php echo $average ?>';
        $("#ratingOrg").rateYo({

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