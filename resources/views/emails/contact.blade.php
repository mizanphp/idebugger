    @extends('layouts.master')
    @section('title', 'Idebugger | Contact us ')

    @section('content')
        <section>
            <div class="top-heading">
                <h1 class="animated fadeInRight">Contact Us</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="organization contactus">
                            <p>
                                Name: {{ $name }}
                            </p>

                            <p>
                                {{ $email }}
                            </p>

                            <p>
                                {{ $user_message }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection