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
    <div class="col-sm-12" ng-controller="enquiryCtrl">
        <div class="card-large card-default card-body">
            <h3 class="left"><span><img src="{{asset('css/clipboards/svg/005-clipboards-10.svg')}}" alt="clipboard" width="20%"></span>Enquiries </h3>
            <br><br>
            <h3 class="right">
                <a class="clickable" href="{{url('/enquiry/add')}}"><span class="blue-text"
                                                                          style="font-size: medium; padding-bottom: 100px;">
                        Add Enquiry
                    </span><i class="fa fa-plus-circle blue-text"></i>
                </a>
            </h3>
            <br><br>
            <table class="table table-hover table-bordered table-responsive{-sm|-md|-lg|-xl}">
                <caption>Double Click to View More Details</caption>
                <thead>
                <tr>
                    <th>
                        Enquiry Number
                    </th>
                    <th>
                        Item
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Payment Method
                    </th>
                    <th>
                        Created At
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="clickable" dir-paginate="enquiry in enquiries = (enquiries  | filter:searchResult) | itemsPerPage:20 "
                    ng-dblclick="open(enquiry)">
                    <td ng-bind="enquiry.id">

                    </td>
                    <td ng-bind="enquiry.name">

                    </td>
                    <td ng-bind="enquiry.status">

                    </td>
                    <td ng-bind="enquiry.payment_method">

                    </td>
                    <td ng-bind="enquiry.created_at">

                    </td>
                </tr>

                </tbody>

            </table>
            <div class="center">
                <dir-pagination-controls
                        template-url="/dist/js/dirPagination.tpl.html"
                        max-size="10"
                        direction-links="true"
                        boundary-links="true">
                </dir-pagination-controls>
            </div>

        </div>

        <br><br>

    </div>

@endsection
