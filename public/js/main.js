var app = angular.module('tutorialWebApp', [
  'ngRoute', 'datatables'
]);

app.config(['$routeProvider', function ($routeProvider) {
  $routeProvider
    .when("/", {templateUrl: "pages/send"})
    .when("/report", {templateUrl: "pages/report"})
    .when("/send", {templateUrl: "pages/send"});
}]);

app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});

app.controller('ContactCtrl', function ($scope, $http) {
    $scope.result = 'hidden';
    $scope.resultMessage;
    $scope.formData;
    $scope.submitButtonDisabled = false;
    $scope.submitted = false;
    $scope.submit = function(contactform) {
        $scope.submitted = true;
        $scope.submitButtonDisabled = true;
        if (contactform.$valid) {
            $http({
                method  : 'POST',
                url     : '/send',
                data    : $.param($scope.formData),
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).success(function(data){
                console.log(data);
                if (data.success) {
                    $scope.submitButtonDisabled = false;
                    $scope.resultMessage = data.message;
                    $scope.result='bg-success';
                } else {
                    $scope.submitButtonDisabled = true;
                    $scope.resultMessage = data.message;
                    $scope.result='bg-danger';
                }
            });
        } else {
            $scope.submitButtonDisabled = false;
            $scope.resultMessage = 'Failed <img src="http://www.chaosm.net/blog/wp-includes/images/smilies/icon_sad.gif" alt=":(" class="wp-smiley">  Please fill out all the fields.';
            $scope.result='bg-danger';
        }
    }
});

app.controller('DatatablesCtrl', function (DTOptionsBuilder, DTColumnBuilder) {
    var vm = this;
    vm.dtOptions = DTOptionsBuilder
        .fromSource('getEmails')
        .withOption('bFilter', false)
        .withOption('bInfo', false)
        .withOption('bPaginate', false)
        .withOption('order', [2, 'desc']);
    vm.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('to').withTitle('Email To'),
        DTColumnBuilder.newColumn('views').withTitle('Views')
    ];
});