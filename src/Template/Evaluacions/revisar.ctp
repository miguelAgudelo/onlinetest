<div ng-controller="pruebacontroller2">
<input type="hidden" ng-value="<?php echo $id; ?>" ng-model="id">
<div class="container2">
<div ng-if="stado==1">
      <div class="alert alert-success">
          <center><strong>La pregunta ah sido corregida!</strong></center>
        </div>
</div>
<div ng-if="stado==2">
      <div class="alert alert-danger">
          <center><strong>La pregunta no ah sido corregida!</strong></center>
        </div>
</div>


<div ng-repeat="evaluacionpregunta in evaluacionpreguntas">
	<div ng-repeat="evaluacion in evaluacionpregunta">
	<div ng-repeat="revisado in evaluacion.revisados">
			<div ng-if="revisado.corregido==0">
			<div class="micontenido">
				<div class="row">
					<div class="col-md-12">
						{{revisado.evaluacionpregunta.user.nombre}} {{revisado.evaluacionpregunta.user.apellido}} C.I: {{revisado.evaluacionpregunta.user.cedula}}
					</div>
					<div class="col-md-12">
						{{revisado.evaluacionpregunta.pregunta.texto}}
					</div>
          <div class="col-md-12">
            maxima nota:{{revisado.evaluacionpregunta.ponderacion}}
          </div>
					<div class="col-md-12">
						{{revisado.texto}}
					</div>

					<form ng-submit="puntuar(revisado.id)">    
                              <div class="form-group">
								  <label for="usr">Puntuación:</label>
								  <input type="number" class="form-control" ng-model="punto">
								</div>
                              
                              <center><input type="submit" id="submit" class="btn btn-success" value="Puntuar" /></center>
                              </form>
                    </div>
				</div>
			</div>
      <div ng-if="revisado.corregido==1">
          <div class="alert alert-info">
            <center><strong>La pregunta ah sido corregida!</strong></center>
          </div>
      </div>  
		</div>	
	 </div>
</div>
</div>

</div>
</div>

