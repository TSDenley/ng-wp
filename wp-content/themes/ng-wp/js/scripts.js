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
			})
			.when('/page/:slug', {
				templateUrl: appVars.partials + '/content.html',
				controller: 'PageCtrl'
			})
			.when('/post/:slug', {
				templateUrl: appVars.partials + '/content.html',
				controller: 'PostCtrl'
			})
			.otherwise({
				redirectTo: appVars.siteURL
			});
	});

	/*
	* Posts controller
	*/
	app.controller('MainCtrl', ['$scope', '$http', '$routeParams', function ($scope, $http, $routeParams) {
		$http
			.get(appVars.siteURL + appVars.APIprefix + 'posts')
			.success(function (res) {
				console.log('Main, get all posts: ', res);
				document.querySelector('title').innerHTML = 'Home | ng-wp';
				$scope.posts = res;
			});
	}]);

	/*
	* Single post controller
	*/
	app.controller('PostCtrl', ['$scope', '$http', '$routeParams', function ($scope, $http, $routeParams) {
		$http
			.get(appVars.siteURL + appVars.APIprefix + 'posts?filter[name]=' + $routeParams.slug)
			.success(function (res) {
				console.log('Single post: ', res);

				var title = res[0].title ? res[0].title + ' | ng-wp' : 'ng-wp';
				document.querySelector('title').innerHTML = title;

				$scope.post = res[0];
			});
	}]);

	/*
	* Page controller
	*/
	app.controller('PageCtrl', ['$scope', '$http', '$routeParams', function ($scope, $http, $routeParams) {
		$http
			.get(appVars.siteURL + appVars.APIprefix + 'pages?filter[pagename]=' + $routeParams.slug)
			.success(function (res) {
				console.log('Page: ', res);

				var title = res[0].title ? res[0].title + ' | ng-wp' : 'ng-wp';
				document.querySelector('title').innerHTML = title;

				$scope.post = res[0];
			});
	}]);

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