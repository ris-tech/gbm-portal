@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-2 text-center">
            <img src="{{asset('assets/img/logo_sig.png')}}">
        </div>
        <div class="col-md-8">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12 mb-2">
                        <span class="fs-2 text-light">Login</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <input id="cardId" type="password" class="form-control @error('cardId') is-invalid @enderror" name="cardId" required autocomplete="false" >

                        @error('cardId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
