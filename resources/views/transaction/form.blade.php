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

<script>
    function validarNumeros() {
        var select = document.getElementById("AccountNumber");
        var options = select.options;
        var numPattern = /^\d+$/;
        
        for (var i = 0; i < options.length; i++) {
            var option = options[i];
            
            if (option.value && !numPattern.test(option.value)) {
                option.disabled = true;
            } else {
                option.disabled = false;
            }
        }
    }
</script>
<div style="width: 85%; text-align: left; margin-left: 8%">
    <br>
    <h2 style="color: white">
        {{ __('Create transaction') }}
    </h2>
    <hr>
</div>
<div class="box box-info padding-1" style="background-color: #1f2937; height: 600px; width: 85%; margin-left: 8%; border-radius: 20px">
    <div class="box-body">
        <br>
        <div class="form-group" style="width:25%; margin-left: 500px; color: white;">
            {{ Form::label('AccountNumber') }}
            {{ Form::select('AccountNumber', isset($accounts) ? $accounts->pluck('AccountNumber', 'AccountNumber') : [], null, ['class' => 'form-control' . ($errors->has('AccountNumber') ? ' is-invalid' : ''), 'placeholder' => 'Select account', 'required', 'onchange' => 'validarNumeros()']) }}
            {!! $errors->first('AccountNumber', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width:25%; margin-left: 500px; color: white">
            {{ Form::label('amount') }}
            {{ Form::number('amount', $transaction->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount', 'step' => '0.01', 'min' => '0']) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width:25%; margin-left: 500px; color: white">
            {{ Form::label('type') }}
            {{ Form::select('type', ['' => 'Select transaction type', 'income' => 'income', 'shipment' => 'shipment'], $transaction->type ?? null, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'required']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20" style="margin-left: 610px; margin-top: 50px">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>