@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-between mb-5">
        <div class="col-lg-3">
            <h2>Pregled</h2>
        </div>
        <div class="col-lg-2 text-end">
            <a class="btn btn-outline-light" href="{{ route('customers.showCustomer', ['cardId' => $customer->cardId]) }}"> Nazad</a>
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
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Deltanos</th>
                        <th>Cena</th>
                        <th>Poeni</th>
                        <th>Opcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{date('D d.m.Y H:i:s', strtotime($order->created_at))}}</td>
                            <td>{{$order->service->service}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->points}}</td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['customerPoints.destroy', $order->id],'style'=>'display:inline']) !!}
                                    <button class="btn btn-sm btn-danger show-alert-delete-box" type="submit"><i class="bi bi-trash-fill"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>

</script>
@endsection
