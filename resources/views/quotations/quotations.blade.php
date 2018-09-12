@extends('layouts.app')

@section('content')
    @include('partials.home_menu.menu')
    <div class="col-sm-12" ng-controller="quotationCtrl">
        <div class="card-large card-default card-body">
            <h3 class="left"><span><img src="{{asset('css/social-icons/quote.svg')}}" alt="clipboard" width="20%"></span>Quotations </h3>
            <br><br><br>
            <table class="table table-hover table-bordered table-responsive{-sm|-md|-lg|-xl}">
                <caption>Double Click to View More Details</caption>
                <thead>
                <tr>
                    <th>
                        Quotation Number
                    </th>
                    <th>
                        Enquiry Number
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Created At
                    </th>
                    <th>
                        Updated At
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="clickable" dir-paginate="quotation in quotations = (quotations  | filter:searchResult) | itemsPerPage:20 "
                    ng-dblclick="open(quotation)">
                    <td ng-bind="quotation.id">

                    </td>
                    <td ng-bind="quotation.enquiry_id">

                    </td>
                    <td ng-bind="quotation.status">

                    </td>
                    <td ng-bind="quotation.created_at">

                    </td>

                    <td ng-bind="enquiry.updated_at">

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
