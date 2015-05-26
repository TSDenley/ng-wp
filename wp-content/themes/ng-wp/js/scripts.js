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
		});

}());