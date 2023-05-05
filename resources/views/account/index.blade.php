@extends('layouts.app')

@section('template_title')
    Account
    
@endsection

@section('content')
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <style>
        th{
            color: white
        }
    </style>
</head>
<div style="width: 85%; text-align: left; margin-left: 8%;">
    <br>
    <h2 style="color: white; size: 24px; margin-left: 5%">
        Accounts
    </h2>
    <hr>
</div>
<br>
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
                             <div class="float-right" style="margin-left: 90%; margin-top: 2%">
                                <a href="{{ route('accounts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    <tr>

										<th>Accountnumber</th>
										<th>Balance</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accounts as $account)
                                        <tr style="background-color: white">
                                            
											<td>{{ $account->AccountNumber }}</td>
											<td>{{ $account->balance }}</td>

                                            <td>
                                                <form action="{{ route('account.destroy', $account->AccountNumber) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('accounts.show',$account->AccountNumber) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('accounts.edit',$account->AccountNumber) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $accounts->links() !!}
            </div>
        </div>
    </div>
@endsection