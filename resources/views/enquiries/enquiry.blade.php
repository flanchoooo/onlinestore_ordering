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
    @if($enquiry->status == 'Waiting For Quotation')
        <div class="col-sm-12">
            <div class="card-large card-default card-body">
                <h3><span><img src="{{asset('css/clipboards/svg/005-clipboards-10.svg')}}" alt="clipboard"
                               width="5%"></span>Enquiry - #{{$enquiry->id}}({{$enquiry->status}}) <span
                            class="clickable red-text right"><i class="fa fa-trash"></i></span></h3>
                <br>
                <h3>Created {{\Carbon\Carbon::parse($enquiry->created_at)->format('d M Y')}}</h3>
                <br>
                {{--<form id="logout-form" action="{{ route('delete_enquiry') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>--}}
                @include('partials.session')

                <form method="post" action="{{url('/enquiry/update')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">

                        <div class="col-md-12">
                            <input type="hidden" name="id" value="{{$enquiry->id}}">
                            <input id="name" type="text" placeholder="Item Name"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                   value="{{ $enquiry->name }}" required autofocus>

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
                                    <option value="{{$item->id}}" {{ ( $enquiry->enquiry_type_id == $item->id ) ? ' selected' : '' }}>{{$item->name}}</option>
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
                                    class="form-control{{ $errors->has('payment_method') ? ' is-invalid' : '' }}"
                                    required autofocus name="payment_method">
                                <option value="Medical Aid" {{ ( $enquiry->payment_method == 'Medical Aid' ) ? ' selected' : '' }}>Medical Aid</option>
                                <option value="Cash" {{ ( $enquiry->payment_method == 'Cash' ) ? ' selected' : '' }}>Cash</option>
                                <option value="EcoCash" {{ ( $enquiry->payment_method == 'EcoCash' ) ? ' selected' : '' }}>EcoCash</option>
                                <option value="TeleCash" {{ ( $enquiry->payment_method == 'TeleCash' ) ? ' selected' : '' }}>TeleCash</option>
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
                                      required>{{$enquiry->description}}</textarea>

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
                                      required>{{$enquiry->description}}</textarea>

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
                                Update Enquiry
                            </button>
                        </div>
                    </div>
                </form>

                <br>
                <h3>
                    Identification
                </h3>
                <hr>
                @foreach($enquiry->getMedia('enquiries') as $media)

                    <a class="chip btn" href="{{ url($media->getUrl()) }}" target="_blank">
                        {{$media->name}} <i class="fa fa-download"></i>
                    </a>
                    <a style="margin: 15px" href="{{url("/enquiry/delete/media?id=$enquiry->id&media_id=$media->id")}}">
                        <i class="fa fa-times red-text"></i>
                    </a>
                    <br><br>
                @endforeach
                <br>
                <h3>
                    Medical Aid
                </h3>
                <hr>
                @foreach($enquiry->getMedia('medical_aid') as $media)

                    <a class="chip btn" href="{{ url($media->getUrl()) }}" target="_blank">
                        {{$media->name}} <i class="fa fa-download"></i>
                    </a>
                    <a style="margin: 15px" href="{{url("/enquiry/delete/media?id=$enquiry->id&media_id=$media->id")}}">
                        <i class="fa fa-times red-text"></i>
                    </a>
                    <br><br>
                @endforeach
                <br>
                <h3>
                    Prescription
                </h3>
                <hr>
                @foreach($enquiry->getMedia('prescription') as $media)

                    <a class="chip btn" href="{{ url($media->getUrl()) }}" target="_blank">
                        {{$media->name}} <i class="fa fa-download"></i>
                    </a>
                    <a style="margin: 15px" href="{{url("/enquiry/delete/media?id=$enquiry->id&media_id=$media->id")}}">
                        <i class="fa fa-times red-text"></i>
                    </a>
                    <br><br>
                @endforeach

            </div>

            <br><br>

        </div>


    @else
        <div class="col-sm-12">
            <div class="card-large card-default card-body">
                <h3 class="blue-text"><span><img src="{{asset('css/clipboards/svg/005-clipboards-10.svg')}}"
                                                 alt="clipboard" width="5%"></span>Enquiry - #{{$enquiry->id}}
                    ({{$enquiry->status}})</h3>
                <br>
                Created {{\Carbon\Carbon::parse($enquiry->created_at)->format('d M Y')}}

                <hr>

                <h3 class="blue-text">
                    Item Name
                </h3>
                <br>
                {{ $enquiry->name }}
                <br>

                <hr>
                <h3 class="blue-text">
                    Description
                </h3>
                <br>
                {{$enquiry->description}}
                <br>
                <hr>
                <br>
                <h3 class="blue-text">
                    Files
                </h3>
                <hr>
                @foreach($enquiry->getMedia('enquiries') as $media)

                    <a class="chip btn" href="{{ url($media->getUrl()) }}" target="_blank">
                        {{$media->name}} <i class="fa fa-download"></i>
                    </a>
                @endforeach
            </div>
            <br><br>
        </div>


    @endif

@endsection
