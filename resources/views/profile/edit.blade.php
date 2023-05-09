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
                        <form method="post" action="{{ route('profile.update') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <h1 style="text-align: center">Edit profile</h1>
                            <hr style="width: 50%; align-content: center">
                            <br>
                            <div style="text-align: center">
                                <label for="fname">First name:</label>
                                <input type="text" id="fname" value="{{ $user->name}}" name="name"><br><br>
                                <label for="lname">Email     :</label>
                                <input type="text" id="email" name="email" value="{{ $user->email}}"><br><br>
                                <input type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
