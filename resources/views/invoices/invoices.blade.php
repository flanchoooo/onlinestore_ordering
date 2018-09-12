@extends('layouts.app')

@section('content')
    @include('partials.home_menu.menu')
    <div class="col-sm-12" ng-controller="invoiceCtrl">
        <div class="card-large card-default card-body">
            <h3 class="left"><img src="{{asset('css/social-icons/invoice.svg')}}" alt="clipboard"
                                  width="20%">Invoices </h3>
            <br><br><br>
            <table class="table table-hover table-bordered table-responsive{-sm|-md|-lg|-xl}">
                <caption>Double Click to View More Details</caption>
                <thead>
                <tr>
                    <th>
                        Order #
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
                <tr class="clickable" dir-paginate="invoice in invoices = (invoices  | filter:searchResult) | itemsPerPage:20 "
                    ng-dblclick="open(invoice)">
                    <td ng-bind="invoice.order.id">

                    </td>
                    <td ng-bind="invoice.status">

                    </td>

                    <td ng-bind="invoice.enquiry.payment_method">

                    </td>
                    <td ng-bind="invoice.created_at">

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
