@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-3 justify-content-between">
        <div class="col-md-3">
            <span class="fs-2"><i class="bi bi-person-circle"></i> Mušterije</span>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <a href="{{route('customers.create')}}" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-title="Nova mušterija"><i class="bi bi-person-plus-fill"></i></a>
                <input type="search" class="form-control" id="search" placeholder="&#xF52A; Pretraga" style="background: rgba(255,255,255,0.7);font-family: bootstrap-icons;" aria-label="Search">
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row justify-content-center">
        @foreach ($customers as $customer)
            <div class="col-md-4 mb-3 customer-cont">
                <a href="{{route('customers.edit', $customer->id)}}" class="text-decoration-none">
                    <div class="card rounded-0">
                        <div class="card-header text-bg-dark rounded-0">
                            <span class="fs-3 customerName">{{$customer->lastName}}, {{$customer->firstName}}</span><span class="float-end">@if($customer->cardId != NULL)<i class="bi bi-credit-card-fill text-success"></i>@else<i class="bi bi-credit-card-fill text-danger"></i>@endif</span>
                        </div>
                        <div class="card-body">
                            {{$customer->phone}}<br>
                            {{$customer->eMail}}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
<script>

    $('#search').on('keyup', function() {
        let inp = $(this).val().toLowerCase();
        $('.customer-cont').each(function(){
            $(this).hide();
        });
        $('.customer-cont').each(function() {
            let customerCont = $(this);
            let customerName = $(this).find('.customerName').html();
            if (customerName.toLowerCase().indexOf(inp) >= 0) {
                $(customerCont).show();
            }
        });
    });
</script>
@endsection
