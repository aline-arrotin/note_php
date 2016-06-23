'use strict';

/**
* Déclaration de l'application routeApp
*/

var routeApp = angular.module('routeApp',[
	'ngRoute',
	'routeAppControllers'
	]);

routeApp.config(['$routeProvider', function($routeProvider){

	//routes possible
	$routeProvider
	.when('/home',{
		templateUrl : 'partials/home.html',
		controller : 'homeCtrl'
	})
	.when('/contact/:id',{
		templateUrl : 'partials/contact.html',
		controller : 'contactCtrl'
	})
	.when('/details',{
		templateUrl : 'partials/details.html',
		controller : 'detailsCtrl'
	})
	.otherwise({
		redirecTo : '/home'
	});
}]);

var routeAppControllers = angular.module('routeAppControllers', []);

// Déclaration controleur accueil

routeAppControllers.controller('homeCtrl',['$scope', function($scope){
	$scope.message = "Bienvenue ici au Cepegra"
}]);


// Déclaration controleur contact

routeAppControllers.controller('contactCtrl',['$scope', function($scope){
	$scope.message = "Laissez-nous un message";
	$scope.msg = "Bonne chance avec Angular";
}]);

// Déclaration controleur detail

routeAppControllers.controller('detailsCtrl',['$scope','$routeParams',
 function($scope, $routeParams){
	$scope.message = "C'est le détail";
	$scope.id = $routeParams.id;
}
}]);







