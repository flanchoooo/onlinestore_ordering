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

            <h3 class="blue-text"><span><img src="{{asset('css/social-icons/quote.svg')}}" alt="clipboard"
                                             width="5%"></span> Quotation - #{{$quotation->id}}({{$quotation->status}})
            </h3>
            <br>
            Created {{\Carbon\Carbon::parse($quotation->created_at)->format('d M Y')}}

            <hr>
            <h3 class="blue-text">
                Enquiry Name
            </h3>

            <br>
            {{ $quotation->enquiry_name }}
            <input type="hidden" name="quotation_id" id="quotation_id" value="{{$quotation->id}}">
            <br>
            <hr>
            <h3 class="blue-text">
                Quotation
            </h3>
            <br>
            <a class="chip btn blue-text" ng-click="generate()">Quotation <i class="fa fa-download"></i></a>
            <br>

            @if($quotation->status == 'Sent')
                <div>
                    <hr>
                    <h3 class="blue-text">Order</h3>
                    <br>
                    <form action="{{url('/order/create')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="invoicing_address">Invoicing Address:</label>
                            <input class="form-control{{ $errors->has('invoicing_address') ? ' is-invalid' : '' }}" type="text" name="invoicing_address" id="invoicing_address" required>
                        </div>
                        <div class="form-group row">
                            <label for="delivery_method">Delivery Method:</label>

                            <select id="delivery_method"
                                    class="form-control{{ $errors->has('delivery_method') ? ' is-invalid' : '' }}"
                                    required autofocus name="delivery_method" ng-model="delivery_method">
                                <option value="" selected>Select Delivery Method</option>
                                <option value="Pickup">Pickup</option>
                                <option value="Deliver">Deliver</option>
                            </select>

                            @if ($errors->has('delivery_method'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('delivery_method') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="delivery_address">Delivery Address:</label>
                            <input class="form-control{{ $errors->has('invoicing_address') ? ' is-invalid' : '' }}" type="text" name="delivery_address" id="delivery_address" required>
                        </div>
                        <div class="form-group row">
                            <label for="contact_person">Contact Person:</label>
                            <input class="form-control{{ $errors->has('contact_person') ? ' is-invalid' : '' }}" type="text" name="contact_person" id="contact_person" required>
                        </div>
                        <div class="form-group row">
                            <label for="contact_number">Contact Number:</label>
                            <input class="form-control{{ $errors->has('contact_person') ? ' is-invalid' : '' }}" type="text" name="contact_number" id="contact_number" required>
                        </div>
                        <input type="hidden" name="enquiry_id" value="{{$quotation->enquiry_id}}">
                        <input type="hidden" name="quotation_id" value="{{$quotation->id}}">
                        <div class="form-group row">
                            <button type="submit" class="chip btn blue white-text">Place Order <i
                                        class="fa fa-check-circle"></i></button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
        <br><br>
    </div>

@endsection