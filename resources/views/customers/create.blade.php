@extends('layouts.app')
@section('content')
<div class="container">
    {!! Form::open(array('route' => 'customers.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-md-6">
            <h1>Nova mušterija</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{route('index')}}" class="btn btn-outline-light">Nazad</a>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Opa!</strong> Problem u unosu!<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <div class="row mb-2">
        <div class="col-md-6">
            <label for="firstName"><b>Ime</b></label>
            <input type="text" name="firstName" class="form-control" id="firstName" autocomplete="off" value="{{old('firstName')}}">
        </div>
        <div class="col-md-6">
            <label for="lastName"><b>Prezime</b></label>
            <input type="text" name="lastName" class="form-control" id="lastName" autocomplete="off" value="{{old('lastName')}}">
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <label for="phone"><b>Telefon</b></label>
            <input type="text" name="phone" class="form-control" id="phone" autocomplete="off" value="{{old('phone')}}">
        </div>
        <div class="col-md-6">
            <label for="eMail"><b>E-Mail</b></label>
            <input type="email" name="eMail" class="form-control" id="eMail" autocomplete="off" value="{{old('eMail')}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <label for="cardId"><b>Kartica</b></label>
            <input type="password" name="cardId" class="form-control" id="cardId" autocomplete="off">
        </div>
        <div class="col-md-2">
            <br>
            <div class="d-grid gap-2">
                 <button type="submit" class="btn btn-success">Unesi</button>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@endsection
