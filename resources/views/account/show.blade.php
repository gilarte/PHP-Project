@extends('layouts.app')

@section('template_title')
    {{ $account->name ?? "{{ __('Show') account" }}
@endsection

@section('content')
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <style>
        div{
            color: white;
            font: italic 20px Arial, sans-serif;
        }
        strong{
            color: white;
            font-weight: bold;
        }
        p{
            color: #286090;
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px
        }
        h2{
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<section class="content container-fluid">
<div style="width: 85%; text-align: left; margin-left: 8%">
    <br>
    <h2>
        {{ __('Show Accounts') }}
    </h2>
    <hr>
</div>
<div class="container-fluid" style="background-color: #1f2937; height: 600px; width: 85%; margin-left: 8%; border-radius: 20px">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="float-right">
                            <a class="btn btn-primary" style="margin-left: 90%; margin-top: 1%" href="{{ route('accounts.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Accountnumber:</strong>
                            <p>{{ $account->AccountNumber }}</p>
                        </div>
                        <hr style="width: 50%">
                        <br>
                        <div class="form-group">
                            <strong>Balance:</strong>
                            <p>{{ $account->balance }}</p>
                        </div>
                        <hr style="width: 50%">
                        

                    </div>
                </div>
            </div>
        </div>
</div>
</section>

@endsection
