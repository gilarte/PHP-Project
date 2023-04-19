@extends('layouts.app')

@section('template_title')
    account
@endsection

@section('content')
<h1>PRUEBA</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Account') }}
                            </span>

                             <div class="float-right">
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
                                        <th>No</th>
                                        
										<th>Accountnumber</th>
										<th>Balance</th>
										<th>User Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accounts as $account)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $account->AccountNumber }}</td>
											<td>{{ $account->balance }}</td>
											<td>{{ $account->user_id }}</td>

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
