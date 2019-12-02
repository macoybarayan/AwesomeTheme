
(function (angular) {
    'use strict';

    angular
        .module('myApp', [])
        .controller('MainController', MainController)

        .directive('contactList', function ($timeout, $http) {
            return {
                restrict: 'EA',
                templateUrl: '/js/admin/angular/templates/contactList.html',
                link: function ($scope, element, attributes) {


                    
                }
            }
        });



    function MainController($scope, $http) {


        console.log(angular);
    }


}(angular));
