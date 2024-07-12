@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>{{$customer->lastName}}, {{$customer->firstName}}</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{route('index')}}" class="btn btn-outline-light">Nazad</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="card text-bg-warning">
                <div class="card-header">
                    Ukupni poeni
                </div>
                <div class="card-body">
                    <h3>{{number_format($customerPoints->total_points,0,'','')}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-success">
                <div class="card-header">
                    Ukupni iznos
                </div>
                <div class="card-body">
                    <h3>{{number_format($customerPoints->total_price,0,',','.')}} RSD</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <a href="{{route('customers.showOrders',$customer->id)}}" class="btn btn-outline-light">Pregled</a>
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
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        @foreach($services as $service)
            <div class="col-md-3 mb-2">
                {!! Form::open(array('route' => 'customerPoints.store','method'=>'POST')) !!}
                <button type="submit" class="btn btn-outline-secondary m-0 p-0 w-100 rounded-0">
                    <input type="hidden" name="customerId" value="{{$customer->id}}">
                    <input type="hidden" name="serviceId" value="{{$service->id}}">
                    <input type="hidden" name="price" value="{{$service->price}}">
                    <input type="hidden" name="points" value="{{$service->points}}">
                <div class="card rounded-0">
                    <div class="card-header m-0 p-0 rounded-0">
                        <img src="@if($service->img ==NULL){{ asset('assets/img/services') }}/placeholder.jpg @else{{ asset('assets/img/services') }}/{{$service->img}}@endif" style="width:100%;">
                    </div>
                    <div class="card-body">
                        <b>{{$service->service}}</b><br>
                        <b>Cena:</b> {{$service->price}} RSD
                    </div>
                </div>
                </button>
                {!! Form::close() !!}
            </div>
        @endforeach
    </div>
</div>

@endsection
