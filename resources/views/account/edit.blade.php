@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} account
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} account</span>
                    </div>
                    <div class="card-body">                      
                        <form method="POST" action="{{ route('accounts.update', $account->AccountNumber) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf
                        
                            @include('account.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
