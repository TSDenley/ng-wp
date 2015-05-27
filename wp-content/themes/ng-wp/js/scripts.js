(function () {

	var app = angular.module('ng-wp', ['ngRoute', 'ngSanitize']);

	/*
	* App config
	*/
	app.config(function ($routeProvider, $locationProvider) {
		$locationProvider.html5Mode(true);

		$routeProvider
			.when('/', {
				templateUrl: appVars.partials + '/main.html',
				controller: 'MainCtrl'
			});
	});

	/*
	* Main controller (home)
	*/
	app.controller('MainCtrl', function ($scope, $http, $routeParams) {
		$http
			.get(appVars.siteURL + appVars.APIprefix + 'posts')
			.success(function (res) {
				console.log('Main, get all posts: ', res);
				$scope.posts = res;
			});
	});

	/*
	* Search form directive
	*/
	app.directive('searchForm', function () {
		return {
			restrict: 'EA',
			template: '<input type="search" name="s" placeholder="Search" ng-model="filter.s" ng-change="search()">',
			controller: function ( $scope, $http ) {
				$scope.filter = {
					s: ''
				};

				$scope.search = function () {
					console.log('Search text: ', $scope.filter.s);

					$http
						.get(appVars.siteURL + appVars.APIprefix + 'posts?filter[s]=' + $scope.filter.s)
						.success(function (res) {
							console.log('Search responce: ', res);
							$scope.posts = res;
						});
				};
			}
		};
	});

}());