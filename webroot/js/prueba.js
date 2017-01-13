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
				$scope.numero=0;
				console.log(localStorageService.get("Angular-prueba"));

			}else{
				$http.get(url).success(function(evaluacionpreguntas){
				
				var mievaluacion=evaluacionpreguntas;
				for (var i = 0; i < mievaluacion.evaluacionpreguntas.length; i++) {
					mievaluacion.evaluacionpreguntas[i].pregunta.resuelta=0;
					console.log(mievaluacion.evaluacionpreguntas[i].pregunta);
					for (var j =0; j <mievaluacion.evaluacionpreguntas[i].pregunta.respuestas.length; j++) {
						delete mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].correcta;
						mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].check=0;
						mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].rpe=0;
					}
				}
				localStorageService.set("Angular-prueba",mievaluacion);
				$scope.evaluacionpreguntas=localStorageService.get("Angular-prueba");
				
				$scope.numero=0; 
				});
			}

        	$scope.load_pregunta=function(c){
				$scope.numero=c;
			};

			$scope.respondi=function(c){
				mievaluacion=localStorageService.get("Angular-prueba");
				for (var i = 0; i < mievaluacion.evaluacionpreguntas.length; i++) {
						if(mievaluacion.evaluacionpreguntas[i].pregunta.id==c){
							mievaluacion.evaluacionpreguntas[i].pregunta.resuelta=1;
						}
					}
					localStorageService.set("Angular-prueba",mievaluacion);
					$scope.evaluacionpreguntas=localStorageService.get("Angular-prueba");
			};

			$scope.respondit=function(c){
				mievaluacion=localStorageService.get("Angular-prueba");
				
				for (var i = 0; i < mievaluacion.evaluacionpreguntas.length; i++) {
						if(mievaluacion.evaluacionpreguntas[i].pregunta.id==c){
							mievaluacion.evaluacionpreguntas[i].pregunta.resuelta=1;
							
							  obj={"texto":this.text};
					          mievaluacion.evaluacionpreguntas[i].pregunta.respuestas.push(obj);
					     
						}
					}
				localStorageService.set("Angular-prueba",mievaluacion);
				$scope.evaluacionpreguntas=localStorageService.get("Angular-prueba");
			};

			$scope.elegi=function(a,b,c){
				if(c==1){
					mievaluacion=localStorageService.get("Angular-prueba");
					for (var i = 0; i < mievaluacion.evaluacionpreguntas.length; i++) {
						if(mievaluacion.evaluacionpreguntas[i].pregunta.id==a){
							for (var j =0; j <mievaluacion.evaluacionpreguntas[i].pregunta.respuestas.length; j++) {
								if(mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].id==b){
									mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].check=1;
								}else{
									mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].check=0;
								}
							}
						}
					}
					localStorageService.set("Angular-prueba",mievaluacion);
					$scope.evaluacionpreguntas=localStorageService.get("Angular-prueba");
				}
				if(c==2){
					mievaluacion=localStorageService.get("Angular-prueba");
					
					for (var i = 0; i < mievaluacion.evaluacionpreguntas.length; i++) {
						if(mievaluacion.evaluacionpreguntas[i].pregunta.id==a){
							for (var j =0; j <mievaluacion.evaluacionpreguntas[i].pregunta.respuestas.length; j++) {
								if(mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].id==b){
									
									mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].rpe++;
									
									if(mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].rpe% 2 == 0){
										mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].check=0;
									}else{
										mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].check=1;
									}
									
									localStorageService.set("Angular-prueba",mievaluacion);
									$scope.evaluacionpreguntas=localStorageService.get("Angular-prueba");
								}
							}
						}
					}
					
				}
			};

			$scope.load_pendiente=function(c){
				mievaluacion=localStorageService.get("Angular-prueba");
				for (var i = 0; i < mievaluacion.evaluacionpreguntas.length; i++) {
					if(mievaluacion.evaluacionpreguntas[i].pregunta.id==c){
						mievaluacion.evaluacionpreguntas[i].pregunta.resuelta=2;
						
					}
				}
				localStorageService.set("Angular-prueba",mievaluacion);
				$scope.evaluacionpreguntas=localStorageService.get("Angular-prueba");
			};

			

			$scope.culminar=function(){
				mievaluacion=localStorageService.get("Angular-prueba");
				for (var i = 0; i < mievaluacion.evaluacionpreguntas.length; i++) {
					evaluacion=mievaluacion.evaluacionpreguntas[i].evaluacion_id;
					
					if(mievaluacion.evaluacionpreguntas[i].pregunta.resuelta==1 && mievaluacion.evaluacionpreguntas[i].pregunta.tipo==1){
						pregunta=mievaluacion.evaluacionpreguntas[i].pregunta.id;
						
						for (var j =0; j <mievaluacion.evaluacionpreguntas[i].pregunta.respuestas.length; j++) {
							if(mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].check==1){
								respuesta=mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].id;
								
								data={"evaluacion":evaluacion,"pregunta":pregunta,"respuesta":respuesta};
								console.log(data);
								$http({
								      method: 'post',
								      url: "http://localhost/pruebaonline3/evaluacionpreguntas/responder",
								      data: {"evaluacion":evaluacion,"pregunta":pregunta,"respuesta":respuesta},
								      dataType:'json'
								    }).
								    success(function(response) {
								        console.log("success")
								        console.log(response)
								    }).
								    error(function(response) {
								        console.log("error")
								    });
							}
						}
					}
					if(mievaluacion.evaluacionpreguntas[i].pregunta.resuelta==1 && mievaluacion.evaluacionpreguntas[i].pregunta.tipo==2){
							pregunta=mievaluacion.evaluacionpreguntas[i].pregunta.id;
							respuestas=[];
							for (var j =0; j <mievaluacion.evaluacionpreguntas[i].pregunta.respuestas.length; j++) {
								if(mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].check==1){
									respuestas.push(mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].id);
								}
							}
							data={"evaluacion":evaluacion,"pregunta":pregunta,"respuesta":respuestas};
							console.log(data);
							$http({
									      method: 'post',
									      url: "http://localhost/pruebaonline3/evaluacionpreguntas/responder",
									      data: {"evaluacion":evaluacion,"pregunta":pregunta,"respuesta":respuestas},
									      dataType:'json'
									    }).
									    success(function(response) {
									        console.log("success")
									        console.log(response)
									    }).
									    error(function(response) {
									        console.log("error")
									    });
						}
						if(mievaluacion.evaluacionpreguntas[i].pregunta.resuelta==1 && mievaluacion.evaluacionpreguntas[i].pregunta.tipo==3){
							pregunta=mievaluacion.evaluacionpreguntas[i].pregunta.id;
							for (var j =0; j <mievaluacion.evaluacionpreguntas[i].pregunta.respuestas.length; j++) {
								
									respuesta=mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].texto;
								
							}
							data={"evaluacion":evaluacion,"pregunta":pregunta,"respuesta":respuesta};
							console.log(data);
							$http({
									      method: 'post',
									      url: "http://localhost/pruebaonline3/evaluacionpreguntas/responder",
									      data: {"evaluacion":evaluacion,"pregunta":pregunta,"respuesta":respuesta},
									      dataType:'json'
									    }).
									    success(function(response) {
									        console.log("success")
									        console.log(response)
									    }).
									    error(function(response) {
									        console.log("error")
									    });
						}
					}
				
				
			};
	};
		
prueba.controller("pruebacontroller", pruebacontroller);