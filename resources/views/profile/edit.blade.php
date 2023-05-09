@extends('layouts.app')

@section('template_title')
    {{ __('Proile') }} Transaction
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-body">
                        <h1 style="text-align: center; color: white; font-size: 35px; margin-top: 1.5%">Edit profile</h1>
                            <hr style="width: 50%; margin-left: 400px; margin-top: 1%">
                            <br>
                            <form style="background-image: linear-gradient(150deg,
                                    #1f2937,
                                    #111827,
                                    black); height: 300px; width: 35%; border-radius: 10%; margin-left: 33%" method="post" action="{{ route('profile.update') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            
                            <div style="margin-left: 80px">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <label style="color: white; margin-right: 10%" for="fname">First name:</label>
                                    <input type="text" id="fname" value="{{ $user->name}}" name="name"><br><br>
                                    <label style="color: white; margin-right: 17%" for="lname">Email     :</label>
                                    <input type="text" id="email" name="email" value="{{ $user->email}}"><br><br>
                                    <input style="border: 0;
                                    background-image: linear-gradient(150deg,
                                            #9500ff,
                                            #09f,
                                            #00DDFF);
                                    border-radius: 8px;
                                    color: #fff;
                                    display: flex;
                                    font-size: 18px;
                                    padding: 4px;
                                    cursor: pointer;
                                    transition: .3s;
                                    margin-top: 10px;
                                    margin-left: 190px" type="submit" value="Submit">                                
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
