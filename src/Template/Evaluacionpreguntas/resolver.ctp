
<div id="wrapper" ng-controller="pruebacontroller">
  <div ng-if="seve==true">
    <div class="alert alert-success">
       <center><strong>Sus respuestas han sido enviadas</strong></center>
       <center>
      <div class="preloader-wrapper big active">
          <div class="spinner-layer spinner-blue">
            <div class="circle-clipper left">
              <div class="circle"></div>
            </div><div class="gap-patch">
              <div class="circle"></div>
            </div><div class="circle-clipper right">
              <div class="circle"></div>
            </div>
          </div>
        </div>
      </center>
      </div>
    </div>

  <div ng-if="seve==false">
  <div ng-if="term==false">
          <div id="sidebar-wrapper" ng-cloack>
              <aside id="sidebar">
                  <ul id="sidemenu" class="sidebar-nav">
                  <div ng-repeat="evaluacionpregunta in evaluacionpreguntas">
                    <div ng-repeat="evaluacion in evaluacionpregunta">
                      <li>
                          <a>
                              <span class="sidebar-title">{{evaluacion.pregunta.texto}}</span>
                                
                                <div ng-if="evaluacion.pregunta.resuelta == 2">
                                  <button class="btn btn-primary btn-xs" ng-click="load_pregunta(evaluacion.pregunta.id)">Responder</button>
                                  <button class="btn btn-danger btn-xs" ng-click="load_pendiente(evaluacion.pregunta.id)">Pendiente</button>
                                </div>
                                <div ng-if="evaluacion.pregunta.resuelta == 0">
                                  <button class="btn btn-primary btn-xs" ng-click="load_pregunta(evaluacion.pregunta.id)">Responder</button>
                                  <button class="btn btn-warning btn-xs" ng-click="load_pendiente(evaluacion.pregunta.id)">Pendiente</button>
                                </div>
                                <div ng-if="evaluacion.pregunta.resuelta == 1">
                                  <button class="btn btn-success btn-xs" ng-click="load_pregunta(evaluacion.pregunta.id)">Responder</button>
                                </div>
                             
                          </a>
                      </li>
                      </div>
                    </div>
                    <br>
                    <center>
                    <button type="button" class="btn btn-success btn-lg" ng-click="terminar()">
                       Finalizar
                    </button>
                    </center>
                  </ul>
              </aside>            
          </div>
          <main id="page-content-wrapper" role="main">
           
                <div ng-repeat="evaluacionpregunta in evaluacionpreguntas">
                  <div ng-repeat="evaluacion in evaluacionpregunta">
                    <div ng-if="evaluacion.pregunta.id == numero">
                       <div class="container2">
                          <h4>{{evaluacion.pregunta.texto}}</h4>
                            <div ng-if="evaluacion.pregunta.photo!=NULL">    
                                <center><img ng-src="../../Files/Preguntas/photo/{{evaluacion.pregunta.photo}}" width="400px" height="200px"></center>
                            </div>
                          <div class="row"><div class="col-md-4 col-md-offset-8">Puntos: {{evaluacion.ponderacion}}</div></div>
                          <div ng-repeat="respuesta in evaluacion.pregunta.respuestas">
                              <div ng-if="evaluacion.pregunta.tipo==1">    
                                <label>
                                <div ng-if="respuesta.check==0">
                                  <input type="radio" value="{{respuesta.id}}" name="miradio" ng-click="elegi(evaluacion.pregunta.id,respuesta.id,evaluacion.pregunta.tipo)">{{respuesta.texto}}
                                </div>
                                <div ng-if="respuesta.check==1">
                                  <input type="radio" value="{{respuesta.id}}" name="miradio" ng-click="elegi(evaluacion.pregunta.id,respuesta.id,evaluacion.pregunta.tipo)" checked="checked">{{respuesta.texto}}
                                </div>
                                </label>
                              </div>
                              <div ng-if="evaluacion.pregunta.tipo==2">    
                                <div class="checkbox">
                                  <label>
                                  <div ng-if="respuesta.check==0">
                                    <input type="checkbox" value="{{respuesta.id}}" ng-click="elegi(evaluacion.pregunta.id,respuesta.id,evaluacion.pregunta.tipo)">{{respuesta.texto}}
                                  </div>
                                  <div ng-if="respuesta.check==1">
                                    <input type="checkbox" value="{{respuesta.id}}" ng-click="elegi(evaluacion.pregunta.id,respuesta.id,evaluacion.pregunta.tipo)" checked="checked">{{respuesta.texto}}
                                  </div>
                                  </label>
                                </div>
                              </div>
                              
                          </div>
                            <div ng-if="evaluacion.pregunta.tipo==3">
                            <div ng-if="evaluacion.pregunta.respuestas.length==0">
                            <form ng-submit="respondit(evaluacion.pregunta.id)">    
                                <div class="form-group">
                                  <label for="text">Respuesta:</label>
                                  <textarea class="form-control" rows="5" ng-model="text"></textarea>
                                </div>
                                
                                <center><input type="submit" id="submit" class="btn btn-success" value="Responder" /></center>
                                </form>
                            </div>
                            <div ng-if="evaluacion.pregunta.respuestas.length>0">
                            
                            <form ng-submit="respondit(evaluacion.pregunta.id)">    
                                <div class="form-group">
                                  <label for="text">Respuesta:</label>
                                  <textarea class="form-control" rows="5" ng-model="text" placeholder="{{evaluacion.pregunta.respuestas[0].texto}}"></textarea>
                                </div>
                                
                                <center><input type="submit" id="submit" class="btn btn-success" value="Responder" /></center>
                                </form>
                            </div>
                            
                            </div>
                          <div ng-if="evaluacion.pregunta.tipo!=3">
                            <center><button class="btn btn-success" ng-click="respondi(evaluacion.pregunta.id)">Responder</button></center>
                          </div>
                         
                       </div>
                     </div>
                  </div>     
                </div>
                <div class="container2">
                      <center><h3>{{m1}}:{{s1}}</h3></center>
                </div>
           
          </main>
     
</div>
</div>
      <div class="container2" ng-if="term==true">
        <div>
          <h4>¿Estas seguro que quieres culiminar la prueba?</h4>
        </div>
        <div>
          <h4>todas tus respuestas seran enviadas y evaluadas por el sistema por favor este seguro de que desea culminar la prueba</h4>
        </div>
        <div>
          <button type="button" class="btn btn-default" ng-click="volver()">Volver</button>
          <button class="btn btn-success" ng-click="culminar()">Finalizar</button>
        </div>
      </div>

</div>



