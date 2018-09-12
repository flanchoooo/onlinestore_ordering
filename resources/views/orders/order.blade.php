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
        <div class="card-large card-default card-body" ng-controller="orderCtrl">
            <div><h3 class="blue-text"><img src="{{asset('css/clipboards/svg/008-clipboards-7.svg')}}" alt="clipboard"
                                            width="5%"> Order - #{{$order->id}}({{$order->status}})</h3>
                <input type="hidden" name="quotation_id" id="quotation_id" value="{{$quotation->id}}">
                <input type="hidden" name="order_id" id="order_id" value="{{$order->id}}">
                <span class="right"><button style="margin-right: 10px;" class="btn blue white-text" ng-click="generateQuotation()">View Quotation</button>
                      {{--TODO: ADD Viewing invoices--}}
                {{--@if($order->status == 'Invoice Sent')
                        <button style="margin-right: 10px;" class="btn red white-text" ng-click="generateInvoice()">View Invoice</button>
                @endIf--}}
                </span>
            </div>
            <br>
            Created {{\Carbon\Carbon::parse($order->created_at)->format('d M Y')}}
            <br>
            <hr>

            <h3 class="blue-text">Enquiry #{{$enquiry->id}}</h3>
            {{$enquiry->name}}<br>
            Created {{Carbon\Carbon::parse($enquiry->created_at)->format('d M Y')}}<br>
            <b>Status</b> - {{$enquiry->status}}<br>
            <b>Description</b> - {{$enquiry->description}}
        </div>
        <br><br>
    </div>

@endsection