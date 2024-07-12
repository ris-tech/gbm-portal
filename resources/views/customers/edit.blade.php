@extends('layouts.app')
@section('content')
<div class="container">
    {!! Form::model($customer, ['method' => 'PATCH','route' => ['customers.update', $customer->id]]) !!}
    <div class="row">
        <div class="col-md-6">
            <h1>Promeni mušteriju</h1>
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
            <input type="text" name="firstName" class="form-control" id="firstName" autocomplete="off" value="{{$customer->firstName}}">
        </div>
        <div class="col-md-6">
            <label for="lastName"><b>Prezime</b></label>
            <input type="text" name="lastName" class="form-control" id="lastName" autocomplete="off" value="{{$customer->lastName}}">
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <label for="phone"><b>Telefon</b></label>
            <input type="text" name="phone" class="form-control" id="phone" autocomplete="off" value="{{$customer->phone}}">
        </div>
        <div class="col-md-6">
            <label for="eMail"><b>E-Mail</b></label>
            <input type="email" name="eMail" class="form-control" id="eMail" autocomplete="off" value="{{$customer->eMail}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <label for="cardId"><b>Kartica</b></label>
            <input type="password" name="cardId" class="form-control" id="cardId" autocomplete="off" value="{{$customer->cardId}}">
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
