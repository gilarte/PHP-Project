@extends('layouts.app')

@section('template_title')
    Transaction
    
@endsection

@section('content')
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    
</head>
<div style="width: 85%; text-align: left; margin-left: 8%">
    <br>
    <h2 style="color: white">
        {{ __('Transactions') }}
    </h2>
    <hr>
</div>
    <div class="container-fluid" style="background-color: #1f2937; height: 600px; width: 85%; margin-left: 8%; border-radius: 20px">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title" style="color: white">
                                {{ __('History') }}
                            </span>
                            <hr>

                            <div class="float-right" >
                                <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr style="color: white">
                                        <th>No</th>
                                        
										<th>Accountnumber</th>
                                        <th>Account-Destination</th>
										<th>Amount</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr style="background-color: white">
                                            <td>{{ $transaction->id }}</td>
                                            
											<td>{{ $transaction->AccountNumber }}</td>
                                            <td>{{ $transaction->AccountNumberD }}</td>
											<td>{{ $transaction->amount }}</td>

                                            <td>
                                                <form action="{{ route('transactions.destroy',$transaction->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('transactions.show',$transaction->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $transactions->links() !!}
            </div>
        </div>
    </div>
@endsection
