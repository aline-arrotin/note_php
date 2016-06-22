var myApp = angular.module('myApp',[]);
//Je definis une application angular qui s appel myApp.


myApp.controller("UserCtrl",["$scope", function($scope){ 
	//J'appel mon objet myApp , et je crée un controlleur, je lui donne un nom. Il aura un environnement de travail dans lequel on enregistre les infos et on l'appel scope.
	$scope.user = { 
		// Je crée un objet user qui depend de mon environnement scope.
		//Ce controlleur me definis un objet dans le scope. Il sera accessible dans la section qui utilise le UserCtrl
		"nom" : "Arrotin",
		"prenom" : "Aline"
	};
}]);


myApp.controller("UserNews",["$scope", function($scope){ 
	//J'appel mon objet myApp , et je crée un controlleur, je lui donne un nom. Il aura un environnement de travail dans lequel on enregistre les infos et on l'appel scope.
	$scope.text = { 
		// Je crée un objet user qui depend de mon environnement scope.
		//Ce controlleur me definis un objet dans le scope. Il sera accessible dans la section qui utilise le UserCtrl
		"titre" : "Pourquoi les licornes ont une corne?",
		"text" : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis ligula justo. Sed pharetra convallis pretium. Fusce sollicitudin consectetur dolor, at vehicula risus tempus quis. Nulla sit amet tellus velit. Aliquam dictum diam et mauris faucibus, ac facilisis dui ullamcorper. Phasellus placerat justo vel lacus viverra aliquam. Sed consectetur massa odio. Curabitur vel eros in odio dignissim gravida ut non justo. Integer volutpat venenatis augue, sed venenatis ante porttitor ut. Mauris finibus viverra porttitor."
	};
}]);

myApp.controller('ProductsCtrl', ["$scope", function($scope){
	$scope.products = {
		"catégorie 1" : [{
			"title" : "item 1",
			"prix" : 145.23
		},
		{
			"title" : "item 2",
			"prix" : 65.23
		}
		],

		"catégorie 2" : [{
			"title" : "item 3",
			"prix" : 89.25
		},
		{
			"title" : "item 4",
			"prix" : 72.47
		}
		]
	}
}]);

myApp.controller('MainCtrl', ['$scope', 'Server', function ($scope, Server) {
    var jsonGet = 'http://localhost:8010/_php/_resume_ex/?feed&alt=json';
    Server.get(jsonGet);
}]);


