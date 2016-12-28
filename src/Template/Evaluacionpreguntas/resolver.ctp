<div id="wrapper" ng-controller="pruebacontroller">
        <div id="sidebar-wrapper">
            <aside id="sidebar">
                <ul id="sidemenu" class="sidebar-nav">
                <div ng-repeat="evaluacionpregunta in evaluacionpreguntas">
                  <div ng-repeat="evaluacion in evaluacionpregunta">
                    <li>
                        <a>
                            <span class="sidebar-title">{{evaluacion.pregunta.texto}}</span>
                            <button class="btn btn-primary btn-xs" ng-click="load_pregunta(evaluacion.pregunta.id)">Responder</button>
                        </a>
                    </li>
                    </div>
                  </div>
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
                              <center><img src="../../Files/Preguntas/photo/{{evaluacion.pregunta.photo}}" width="400px" height="200px"></center>
                          </div>
                        <div class="row"><div class="col-md-4 col-md-offset-8">Puntos: {{evaluacion.ponderacion}}</div></div>
                        <div ng-repeat="respuesta in evaluacion.pregunta.respuestas">
                            <div ng-if="evaluacion.pregunta.tipo==1">    
                              <label><input type="radio" value="{{respuesta.id}}" name="miradio">{{respuesta.texto}}</label>
                            </div>
                            <div ng-if="evaluacion.pregunta.tipo==2">    
                              <div class="checkbox">
                                <label><input type="checkbox" value="{{respuesta.id}}">{{respuesta.texto}}</label>
                              </div>
                            </div>
                            
                        </div>
                          <div ng-if="evaluacion.pregunta.tipo==3">    
                              <div class="form-group">
                                <label for="comment">Respuesta:</label>
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                              </div>
                          </div>
                        <center><?= $this->Form->button('Responder',['class'=>'btn btn-success','type'=>'button','id'=>'terminar']) ?></center>
                     </div>
                   </div>
                </div>     
              </div>
         
        </main>
    </div> 




