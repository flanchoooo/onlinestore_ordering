@extends('layouts.app')

@section('content')
    @include('partials.home_menu.menu')
    <div class="col-sm-12" ng-controller="enquiryCtrl">
        <div class="card-large card-body white shadow-1">
            <h2><span><img src="{{asset('css/clipboards/svg/005-clipboards-10.svg')}}" alt="clipboard"
                           width="5%"></span>Make Enquiry</h2>
            <br>
            @include('partials.session')


            <form method="POST" action="{{ url('/enquiry/create') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="name" type="text" placeholder="Item Name"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                               value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-12">
                        <select id="type"
                                class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}"
                                required autofocus name="type">
                            <option value="" selected>Select Enquiry Type</option>
                            @foreach($items as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-12">
                        <select id="payment_method"
                                class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}"
                                required autofocus name="payment_method" ng-model="payment_method">
                            <option value="" selected>Select Payment Method</option>
                            <option value="Medical Aid">Medical Aid</option>
                            <option value="Cash">Cash</option>
                            <option value="EcoCash">EcoCash</option>
                            <option value="TeleCash">TeleCash</option>
                        </select>

                        @if ($errors->has('payment_method'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('payment_method') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-12">
                            <textarea placeholder="Description"
                                      class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                      name="description"
                                      required></textarea>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-12">
                            <textarea placeholder="Address"
                                      class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                      name="address"
                                      required></textarea>

                        @if ($errors->has('address'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-12">
                        <label for="file">Identification</label>

                        <input id="file" type="file" placeholder="File"
                               class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file"
                               value="{{ old('file') }}">

                        @if ($errors->has('file'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div ng-if="payment_method == 'Medical Aid'">
                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="medical_aid_file">Medical Aid</label>

                            <input id="medical_aid_file" type="file" placeholder="Medical Aid"
                                   class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}"
                                   name="medical_aid_file"
                                   value="{{ old('medical_aid_file') }}" required>

                            @if ($errors->has('medical_aid_file'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('medical_aid_file') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="prescription_file">Prescription</label>

                        <input id="prescription_file" type="file" placeholder="Prescription"
                               class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}"
                               name="prescription_file"
                               value="{{ old('prescription_file') }}" required>

                        @if ($errors->has('prescription_file'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('prescription_file') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>



                <div class="form-group row mb-0">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            Make Enquiry
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>

@endsection
