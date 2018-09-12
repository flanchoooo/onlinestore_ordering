angular.module('menuApp', ['angularUtils.directives.dirPagination'])
    .controller('mainCtrl', ['$scope', '$http', '$timeout', function ($scope, $http, $timeout) {
        var loadTime = 1000, //Load the data every second
            errorCount = 0, //Counter for the server errors
            loadPromise; //Pointer to the promise created by the Angular $timout service

        var getData = function () {
            $http.get('/menu/data')

                .then(function (res) {
                    $scope.data = res.data;
                    errorCount = 0;
                    nextLoad();
                })

                .catch(function (res) {
                    $scope.data = 'Server error';
                    nextLoad(++errorCount * 2 * loadTime);
                });
        };

        var cancelNextLoad = function () {
            $timeout.cancel(loadPromise);
        };

        var nextLoad = function (mill) {
            mill = mill || loadTime;

            //Always make sure the last timeout is cleared before starting a new one
            cancelNextLoad();
            loadPromise = $timeout(getData, mill);
        };


        //Start polling the data from the server
        getData();


        //Always clear the timeout when the view is destroyed, otherwise it will keep polling and leak memory
        $scope.$on('$destroy', function () {
            cancelNextLoad();
        });

        $scope.data = 'Loading...';
    }])
    .controller('quotationCtrl', ['$scope', '$http', '$window', function ($scope, $http, $window) {
        $http.get('/quotations/get')
            .then(function (data) {
                $scope.quotations = data.data
                console.log($scope.quotations)
            }, function (error) {
                console.log(error)
            });
        $scope.customer_id = 0;
        $scope.loading = false;
        $scope.invoice = {
            items: [{
                name       : 'item',
                description: 'item description',
                qty        : 5,
                price      : 5.5
            }]
        };
        $scope.add = function () {
            $scope.invoice.items.push({
                name       : '',
                description: '',
                qty        : 1,
                price      : 0
            });
        },
            $scope.remove = function (index) {
                $scope.invoice.items.splice(index, 1);
            },
            $scope.total = function () {
                var total = 0;
                angular.forEach($scope.invoice.items, function (item) {
                    total += item.qty * item.price;
                });
                return total;
            };

        $scope.preview = function () {
            if ($scope.total() == 0) {
                return
            }
            var data = {
                total: $scope.total(),
                items: $scope.invoice.items,
                user : $('#customer_id').val()
            };
            $window.open('/quotation/preview?' + $.param(data), '_blank')
        }

        $scope.send = function () {
            $scope.loading = true;

            if ($scope.total() == 0) {
                return
            }
            var data = {
                total  : $scope.total(),
                items  : $scope.invoice.items,
                user   : $('#customer_id').val(),
                enquiry: $('#enquiry_id').val()
            };
            $http.post('/quotation/send', data)
                .then(function (data) {
                    swal(data.data)
                    $scope.loading = false;
                }, function (error) {
                    console.log(error)
                });
        }

        $scope.generate = function () {
            var data = {
                id: $('#quotation_id').val()
            };
            $window.open('/quotation?' + $.param(data), '_blank')

        }

        $scope.open = function (quotation) {
            $window.open('/quotation/' + quotation.id, '_self')
        }
    }])
    .controller('orderCtrl', ['$scope', '$http', '$window', function ($scope, $http, $window) {
        $scope.generateInvoice = function () {
            var data = {
                enquiry  : $('#enquiry_id').val(),
                order    : $('#order_id').val(),
                quotation: $('#quotation_id').val(),
            };

        };
        $scope.generateQuotation = function () {
            var data = {
                id: $('#quotation_id').val()
            };
            $window.open('/quotation?' + $.param(data), '_blank')
        }
    }])
    .controller('enquiryCtrl', ['$scope', '$http', '$window', function ($scope, $http, $window) {

        $http.get('/enquiries/get')
            .then(function (data) {
                $scope.enquiries = data.data
                console.log($scope.enquiries)
            }, function (error) {
                console.log(error)
            });

        $scope.open = function (enquiry) {
            $window.open('/enquiry/' + enquiry.id, '_self')
        }

        $scope.medical_aid = false;
        $("#medical_aid").change(function () {
            $scope.medical_aid = !!this.checked;
        });
    }])
    .controller('invoiceCtrl', ['$scope', '$http', '$window', function ($scope, $http, $window) {

        $scope.loading = false;

        $http.get('/invoices/get')
            .then(function (data) {
                $scope.invoices = data.data
                console.log($scope.invoices)
            }, function (error) {
                console.log(error)
            });

        $scope.generateInvoice = function () {
            var data = {
                quotation: $('#quotation').val(),
                invoice  : $('#invoice').val()
            };
            $window.open('/invoice?' + $.param(data), '_blank')
        };
        $scope.generateQuotation = function () {
            var data = {
                id: $('#quotation_id').val()
            };
            $window.open('/quotation?' + $.param(data), '_blank')
        };
        $scope.paynow = function () {
            if ($('#billing_address').val().length == 0) {
                swal("", "Please enter a billing address", "warning")
                return;
            }
            $scope.loading = true;

            var data = {
                reference      : $('#order').val(),
                amount         : $('#amount').val(),
                billing_address: $('#billing_address').val()
            };
            $window.open('/paynow/initiate?' + $.param(data), '_self')

        };

        $scope.acceptpayment = function () {
            if ($('#billing_address').val().length == 0) {
                swal("", "Please enter a billing address", "warning")
                return;
            }

            var data = {
                reference      : $('#order').val(),
                amount         : $('#amount').val(),
                billing_address: $('#billing_address').val()
            };
            $scope.loading = true;
            $window.open('/accept/cash?' + $.param(data), '_self')


        };
        $scope.acceptMedicalAidPayment = function () {
            if ($('#billing_address').val().length == 0) {
                swal("", "Please enter a billing address", "warning")
                return;
            }
            $scope.loading = true;

            var data = {
                reference      : $('#order').val(),
                amount         : $('#amount').val(),
                billing_address: $('#billing_address').val()
            };
            $window.open('/accept/medical-aid?' + $.param(data), '_self')


        };

        $scope.open = function (invoice) {
            $window.open('/invoice/' + invoice.id, '_self')
        }
    }])
    .controller('paymentCtrl', ['$scope', '$http', '$window', function ($scope, $http, $window) {
        $scope.loading = false;

        $scope.sendDeliveryNote = function () {
            if ($('#delivery_date').val().length == 0) {
                swal('', 'The Delivery Date is required!', 'warning');
                return;
            }
            $scope.loading = true;
            var data = {
                enquiry  : $('#enquiry').val(),
                order    : $('#order').val(),
                quotation: $('#quotation').val(),
                payment  : $('#payment').val(),
                date     : $('#delivery_date').val(),
            };
            $http.post('/delivery-note/send', data)
                .then(function (data) {
                    swal('', data.data, 'success')
                    $scope.loading = false;
                }, function (error) {
                    swal('', 'Something went wrong. Please try again!', 'error');
                    $scope.loading = false;
                    console.log(error)
                });
        };
        $scope.generateDeliveryNote = function () {
            if ($('#delivery_date').val().length == 0) {
                swal('', 'The Delivery Date is required!', 'warning');
                return;
            }
            var data = {
                enquiry  : $('#enquiry').val(),
                order    : $('#order').val(),
                quotation: $('#quotation').val(),
                payment  : $('#payment').val(),
                date     : $('#delivery_date').val(),

            };
            $window.open('/delivery-note?' + $.param(data), '_blank')
        }
        $scope.generateSentDeliveryNote = function () {

            var data = {
                enquiry  : $('#enquiry').val(),
                order    : $('#order').val(),
                quotation: $('#quotation').val(),
                payment  : $('#payment').val(),
                id       : $('#id').val(),

            };
            $window.open('/delivery-note/sent?' + $.param(data), '_blank')
        }

        $scope.confirmDelivery = function () {
            $scope.loading = true;
            var data = {
                id: $('#id').val()
            };
            $window.open('/confirm-delivery?' + $.param(data), '_self');


        }
    }])
    .controller('productCtrl', ['$scope', '$http', '$window', function ($scope, $http, $window) {
        $scope.loading = false;
        $scope.qty = 1;


    }])
    .controller('checkoutCtrl', ['$scope', '$http', '$window', function ($scope, $http, $window) {
        $scope.loading = false;
        $scope.qty = 1;
        $scope.delivery_fee = 0;

        $scope.city = ''

        $scope.update = function () {
            if ($scope.city == 'Harare') {
                $scope.delivery_fee = 5;
            } else if ($scope.city == 'Bulawayo') {
                $scope.delivery_fee = 15;

            } else if ($scope.city == 'Chegutu') {
                $scope.delivery_fee = 6;

            } else if ($scope.city == 'Kadoma') {
                $scope.delivery_fee = 7;

            }
            else if ($scope.city == 'Kwekwe') {
                $scope.delivery_fee = 8;

            } else if ($scope.city == 'Gweru') {
                $scope.delivery_fee = 10;

            }
        }


    }]);
