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

<div class="box box-info padding-1" style="background-color: #1f2937; height: 600px; width: 85%; margin-left: 8%; border-radius: 20px">
    <div class="box-body">
        <br>
        <br>
        <div class="form-group" style="width:25%; margin-left: 500px; color: white">
            {{ Form::label('AccountNumber') }}
            {{ Form::text('AccountNumber', $account->AccountNumber, ['class' => 'form-control' . ($errors->has('AccountNumber') ? ' is-invalid' : ''), 'placeholder' => 'Accountnumber', 'required']) }}
            {!! $errors->first('AccountNumber', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width:25%; margin-left: 500px; color: white;">
            {{ Form::label('balance') }}
            {{ Form::text('balance', $account->balance, ['class' => 'form-control' . ($errors->has('balance') ? ' is-invalid' : ''), 'placeholder' => 'Balance', 'required']) }}
            {!! $errors->first('balance', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{ Form::hidden('user_id', auth()->user()->id) }}
    </div>
    <div class="box-footer mt20" style="margin-left: 640px; margin-top: 50px">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>