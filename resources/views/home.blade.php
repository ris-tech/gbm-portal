@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-2 text-center">
            <img src="{{asset('assets/img/logo_sig.png')}}">
        </div>
    </div>
    @if ($errors->any())
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        </div>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-4">
                {!! Form::open(array('route' => 'customers.showCustomer','method'=>'GET')) !!}
                <div class="card" style="background: rgba(255,255,255,0.5);">
                    <div class="card-body text-center text-light">
                        <i class="bi bi-credit-card" style="font-size:5em;"></i>
                    </div>
                </div>
                <input id="cardId" type="password" class="form-control @error('cardId') is-invalid @enderror" name="cardId" required autocomplete="false" >
                {!! Form::close() !!}
        </div>
    </div>
</div>
<script>
    $( document ).ready(function() {
        $('#cardId').focus();
        $('#cardId').css('opacity', '0');
    });
</script>
@endsection
