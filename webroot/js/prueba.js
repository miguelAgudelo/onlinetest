var prueba=angular.module('prueba',['LocalStorageModule']);
prueba.config(function (localStorageServiceProvider) {
  localStorageServiceProvider
    .setPrefix('prueba')
    .setStorageType('sessionStorage')
    .setNotify(true, true)
});
var pruebacontroller=function($scope,$http,localStorageService,$timeout){
		var url='http://localhost/pruebaonline/evaluacionpreguntas.json';
		$scope.seve=false;
		$scope.term=false;
		$scope.s1=this.sg;
		$scope.m1=this.mm;
		window.setTimeout(tiempo, 1000);
			if(localStorageService.get("Angular-prueba")){
				$scope.evaluacionpreguntas=localStorageService.get("Angular-prueba");
				$scope.numero=0;
				console.log(localStorageService.get("Angular-prueba"));
				$scope.mm = localStorageService.get("Angular-reloj1");
				$scope.sg = localStorageService.get("Angular-reloj2"); 
			}else{
				$http.get(url).success(function(evaluacionpreguntas){
				
				var mievaluacion=evaluacionpreguntas;
				for (var i = 0; i < mievaluacion.evaluacionpreguntas.length; i++) {
					var reloj1=mievaluacion.evaluacionpreguntas[i].evaluacion.contiempo;
					var reloj2=mievaluacion.evaluacionpreguntas[i].evaluacion.reloj;
					mievaluacion.evaluacionpreguntas[i].pregunta.resuelta=0;
					console.log(mievaluacion.evaluacionpreguntas[i].pregunta);
					for (var j =0; j <mievaluacion.evaluacionpreguntas[i].pregunta.respuestas.length; j++) {
						delete mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].correcta;
						mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].check=0;
						mievaluacion.evaluacionpreguntas[i].pregunta.respuestas[j].rpe=0;
					}
				}
				localStorageService.set("Angular-prueba",mievaluacion);
				localStorageService.set("Angular-reloj1",reloj1);
				localStorageService.set("Angular-reloj2",reloj2);
				$scope.evaluacionpreguntas=localStorageService.get("Angular-prueba");
				
				$scope.numero=0;
				$scope.mm = localStorageService.get("Angular-reloj1");
				$scope.sg = localStorageService.get("Angular-reloj2"); 
				});
			}
			
			var si=0;
			var tiempo = function() {
					        this.s1--;
					        console.log("pasa");
					        if(this.s1==0){
					        	this.m1--;
					        	this.s1=59;
					        }
					        if(this.m1==0){
					        	$scope.term=true;
					        	si=1;
							}
							if(si==0){
								window.setTimeout(tiempo, 1000);
							}
					      
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

			$scope.terminar=function(){
				$scope.term=true;
				
			};

			$scope.volver=function(){
				$scope.term=false;
			};


			$scope.culminar=function(){
				mievaluacion=localStorageService.get("Angular-prueba");
				$scope.seve=true;
				$scope.term=false;
				
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
								      url: "http://localhost/pruebaonline/evaluacionpreguntas/responder",
								      data: {"evaluacion":evaluacion,"pregunta":pregunta,"respuesta":respuesta},
								      dataType:'json'
								    }).
								    success(function(response) {
								        console.log("success");
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
									      url: "http://localhost/pruebaonline/evaluacionpreguntas/responder",
									      data: {"evaluacion":evaluacion,"pregunta":pregunta,"respuesta":respuestas},
									      dataType:'json'
									    }).
									    success(function(response) {
									        console.log("success")
									        
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
									      url: "http://localhost/pruebaonline/evaluacionpreguntas/responder",
									      data: {"evaluacion":evaluacion,"pregunta":pregunta,"respuesta":respuesta},
									      dataType:'json'
									    }).
									    success(function(response) {
									        console.log("success")
									    }).
									    error(function(response) {
									        console.log("error")
									    });
						}
					}
				localStorageService.clearAll();
				localStorageService.cookie.clearAll();
				location.replace("http://localhost/pruebaonline/evaluacions");
				
			};
			
			

			
			
	};
		
prueba.controller("pruebacontroller", pruebacontroller);

var pruebacontroller2 = function($scope,$http,$timeout){
		var url='http://localhost/pruebaonline/revisados/';
		txt =String(window.location.href);
		txt = txt.replace(/\D/g,'');
		var id=txt;
		
		angular.element(document).ready(function () {
        	$http.get(url+id+'.json').success(function(evaluacionpreguntas){
				$scope.evaluacionpreguntas=evaluacionpreguntas;
				$scope.seve=1;
				console.log(evaluacionpreguntas);
			});
    	});
		
		 $scope.puntuar=function(c){
				
				$http({
						method: 'post',
						url: "http://localhost/pruebaonline/evaluacions/revisar/"+id,
						data: {"id":c,"punto":this.punto},
						dataType:'json'
						}).
						success(function(response) {
						 	console.log("success")
						 	var success=true;
						 	$scope.stado=1;
							$timeout(countUp, 2000);
						}).
						error(function(response) {
							console.log("error")
							var success=false;
							$scope.stado=2;
							$timeout(countDown, 2000);
						});
						if(success=true){
							var mievaluacion=this.evaluacionpreguntas;
							for (var i = 0; i < mievaluacion.evaluacionpreguntas.length; i++) {
								for (var j =0; j <mievaluacion.evaluacionpreguntas[i].revisados.length; j++) {
									if(mievaluacion.evaluacionpreguntas[i].revisados[j].id==c){
										mievaluacion.evaluacionpreguntas[i].revisados[j].corregido=1;
										mievaluacion.evaluacionpreguntas[i].revisados[j].punto=this.punto;
										
									}
								}
							}	
							this.evaluacionpreguntas=mievaluacion;
						}

						var countUp = function() {
					        $scope.stado=0;
					    }
						var countDown= function() {
					        $scope.stado=0;
					    }
				
			};
		};
prueba.controller("pruebacontroller2", pruebacontroller2);