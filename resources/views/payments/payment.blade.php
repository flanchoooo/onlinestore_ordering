@extends('layouts.app')
@section('styles')
    <style>
        .pagination {
            display: inline-flex;
            margin: 0 auto;
        }
    </style>

@endsection
@section('content')
    @include('partials.home_menu.menu')
    <div class="col-sm-12">
        <div class="card-large card-default card-body" ng-controller="quotationCtrl">

            @include('partials.session')
            @include('partials.error')

            <h3 class="blue-text"><span><img src="{{asset('css/social-icons/receipt.svg')}}" alt="clipboard"
                                             width="5%"></span> Payment - #{{$payment->id}}({{$payment->status}})(${{$payment->amount}})
            </h3>
            <br>
            Created {{\Carbon\Carbon::parse($payment->created_at)->format('d M Y')}}
        </div>
        <br><br>
    </div>

@endsection