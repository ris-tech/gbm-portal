@extends('layouts.app')

@section('content')
<div class="row justify-content-between">
    <div class="col-lg-3">
            <h2>Nova Delatnost</h2>
    </div>
    <div class="col-lg-2 text-end">
        <a class="btn btn-outline-light" href="{{ route('services.index') }}"> Nazad</a>
    </div>
</div>
<hr>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Opa!</strong> Desila se greška.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

{!! Form::open(array('route' => 'services.store','method'=>'POST')) !!}
<div class="row mb-3 p-3 shadow">
    <div class="col-md-6">
        <div class="form-group">
            <label for="service"><strong>Ime Delatnosti:</strong></label>
            <input class="form-control" id="service" name="service" placeholder="Ime Delatnosti" value="{{old('service')}}">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="price"><strong>Cena:</strong></label>
            <input type="number" class="form-control" id="price" name="price" placeholder="" value="{{old('price')}}">
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label for="points"><strong>Poeni:</strong></label>
            <input type="number" class="form-control" id="points" name="points" placeholder="" value="{{old('points')}}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="img"><strong>Slika:</strong></label>
            <input type="file" class="form-control" id="img" name="img" placeholder="Slika" value="{{old('img')}}">
        </div>
    </div>
</div>
<div class="row mb-3 p-3 shadow">
    <div class="col-xs-12 col-sm-12 col-md-2 offset-md-10 align-self-end">
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success">Unesi</button>
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection
