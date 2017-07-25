@extends('layouts.master')
@section('title', 'Organizations ')

@section('content')
    <section>
        <div class="top-heading">
            <h1 class="animated fadeInRight">Organizations</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <div class="back">
                        <a class="btn btn-default" href="{{ URL::previous() }}">Go Back</a>
                    </div>



                    @if(isset($organizations))
                    <div class="organization-list">

                        <div class="box input-width">
                            {!! Form::open(array('url'=>'/organizations','method'=>'GET','class'=>'form-group')) !!}
                                {!! Form :: text('filter','',array('class'=>'form-control pull-left','placeholder'=>'Search..')) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-search"></span>',$attribute=array('value'=>'submit','class'=>'btn pull-left','type'=>'submit')) !!}
                            {!! Form::close()!!}

                            @if(Auth::check())
                            {!! Html::link('/organizations/create','Create New',array('class'=>'create_link')) !!}
                            @endif
                        </div>

                        <div class="employee-list">
                            <table>
                                <thead>
                                <tr>
                                    <th class="id">#id</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Email</th>
                                    <th>Details</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $i=1 ?>

                                @foreach($organizations as $organization)
                                    <tr>
                                        <td class="id"><?php echo $i ?></td>
                                        <td class="">
                                            {!! $organization->name !!}
                                            <div class="logo">
                                                {!! Html::image("uploads/logo/$organization->logo","Logo",array('height'=>50,'width'=>60))!!}
                                            </div>

                                        </td>
                                        <td class="">{!! $organization->address !!}</td>
                                        <td class="">{!! $organization->email!!}</td>
                                        <td class=""><a class="btn" href="{{url('organizations/show',$organization->id)}}">View</a></td>

                                        <!--<td>{!! Html :: link("/organizations/$organization->id","View")!!}</td>-->

                                    </tr>
                                <?php $i++ ?>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $organizations->render() !!}

                            @if(Session :: has('message'))
                            <div class="alert {{Session::get('className')}}">
                                {{Session :: get('message')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection