var prueba=angular.module('prueba',['LocalStorageModule']);
prueba.config(function (localStorageServiceProvider) {
  localStorageServiceProvider
    .setPrefix('prueba')
    .setStorageType('sessionStorage')
    .setNotify(true, true)
});
var pruebacontroller=function($scope,$http,localStorageService){
		var url='http://localhost/pruebaonline3/evaluacionpreguntas.json';
			if(localStorageService.get("Angular-prueba")){
				$scope.evaluacionpreguntas=localStorageService.get("Angular-prueba");
			}else{
				$http.get(url).success(function(evaluacionpreguntas){
				localStorageService.set("Angular-prueba",evaluacionpreguntas);
				$scope.evaluacionpreguntas=localStorageService.get("Angular-prueba");
				$scope.numero=0; 
				console.log(evaluacionpreguntas)
				});
			}

        	$scope.load_pregunta=function(c){
				console.log(c);
				$scope.numero=c;
			};
	};
		
prueba.controller("pruebacontroller", pruebacontroller);