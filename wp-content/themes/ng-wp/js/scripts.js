(function () {

	angular.module('ng-wp', ['ngRoute', 'ngSanitize'])

		/*
		* App config
		*/
		.config(function ($routeProvider, $locationProvider) {
			$locationProvider.html5Mode(true);

			$routeProvider
				.when('/', {
					templateUrl: appVars.partials + '/main.html',
					controller: 'MainCtrl'
				});
		})

		/*
		* Main controller (home)
		*/
		.controller('MainCtrl', function ($scope, $http, $routeParams) {
			$http.get(appVars.siteURL + 'wp-json/wp/v2/posts').success(function (res) {
				console.log(res);
				$scope.posts = res;
			});
		})

		/*
		* Search form directive
		*/
		.directive('searchForm', function () {
			return {
				restrict: 'EA',
				template: '<input type="search" name="s" placeholder="Search" ng-model="filter.s" ng-change="search()">',
				controller: function ( $scope, $http ) {
					$scope.filter = {
						s: ''
					};

					$scope.search = function () {
						console.log($scope.filter.s);

						if ( $scope.filter.s.length > 2 ) {
							$http
								.get(appVars.siteURL + 'wp-json/wp/v2/posts?filter[s]=' + $scope.filter.s)
								.success(function (res) {
									$scope.posts = res;
								});
						};
					};
				}
			};
		});

}());