@extends('layouts.app')

@section('content')
<div class="row justify-content-between mb-5">
    <div class="col-lg-3">
        <h2>Promeni delatnost</h2>
    </div>
    <div class="col-lg-2 text-end">
        <a class="btn btn-outline-light" href="{{ route('services.index') }}"> Nazad</a>
    </div>
</div>

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

{!! Form::model($service, ['method' => 'PATCH','route' => ['services.update', $service->id],'enctype' => 'multipart/form-data']) !!}
<div class="row mb-3 p-3 shadow">
    <div class="col-md-6">
        <div class="form-group">
            <label for="service"><strong>Ime Delatnosti:</strong></label>
            <input class="form-control" id="service" name="service" placeholder="Ime Delatnosti" value="{{$service->service}}">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="price"><strong>Cena:</strong></label>
            <input type="number" class="form-control" id="price" name="price" placeholder="" value="{{$service->price}}">
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label for="points"><strong>Poeni:</strong></label>
            <input type="number" class="form-control" id="points" name="points" placeholder="" value="{{$service->points}}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="img"><strong>Slika:</strong></label>
            <img src="@if($service->img ==NULL){{ asset('assets/img/services') }}/placeholder.jpg @else{{ asset('assets/img/services') }}/{{$service->img}}@endif">
            <input type="file" class="form-control" id="img" name="img" placeholder="Slika">
        </div>
    </div>
</div>
<div class="row mb-3 p-3 shadow">
    <div class="col-xs-12 col-sm-12 col-md-2 offset-md-10 align-self-end">
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success">Promeni</button>
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection
