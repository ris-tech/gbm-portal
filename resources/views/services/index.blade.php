@extends('layouts.app')

@section('content')
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Delatnosti</h1>
    </div>
    <div class="col-md-6 text-end">
        <a class="btn btn-success" href="{{ route('services.create') }}"> Unesi novu delatnost</a>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
  <tr>
     <th></th>
     <th>Delatnost</th>
     <th>Opcije</th>
  </tr>
    @foreach ($services as $service)
    <tr>
        <td><img src="@if($service->img ==NULL){{ asset('assets/img/services') }}/placeholder.jpg @else{{ asset('assets/img/services') }}/{{$service->img}}@endif"></td>
        <td>{{ $service->service }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Promeni"><i class="bi bi-pencil-square"></i></a>
            {!! Form::open(['method' => 'DELETE','route' => ['services.destroy', $service->id],'style'=>'display:inline']) !!}
                <button class="btn btn-danger show-alert-delete-box" type="submit"><i class="bi bi-trash-fill"></i></button>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</table>


@endsection
