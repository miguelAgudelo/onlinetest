<div class="container2">
	<center><h4>Resultados de la evaluacion <?= $evaluacion->nombre ?></h4></center>
	<?php foreach ($notas as $user): ?>
		<?php  $total=0;$total2=0;$visible=true; ?>
		<div id="micuadro2">
		<table class="table table-striped">
		<thead>
		<tr>
			<th>
			<div class="#mipregunta"><?= $user->nombre." ".$user->apellido." CI:".$user->cedula ?></div>
			</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($user->evaluacionpreguntas as $evaluacion): ?>
			<?php if(!empty($evaluacion->revisados)): ?>
				<?php foreach ($evaluacion->revisados as $revisado): ?>
					<?php if($revisado->corregido==0): ?>
						<?php $visible=false; ?>
					<?php endif; ?>
				<?php endforeach ?>
			<?php endif; ?>
		<?php endforeach ?>
		<?php if($visible==true): ?>
		<?php foreach ($user->evaluacionpreguntas as $evaluacion): ?>
			<tr>
				<td><?= $evaluacion->pregunta->texto ?></td>
				<?php if(!empty($evaluacion->resultados)): ?>
				<?php if(count($evaluacion->resultados)==1): ?>
					<td><?php if($evaluacion->resultados[0]->correcta==1){echo "correcta";}else{ echo "incorrecta";} ?></td>
					<td><?= $evaluacion->resultados[0]->puntos ?></td>
					<?php $total=$total+$evaluacion->resultados[0]->puntos; ?>
				<?php else: ?>
					<?php foreach ($evaluacion->resultados as $resultado): ?>
						<?php $total2=$total2+$resultado->puntos; ?>
					<?php endforeach ?>
					<td><?php if($evaluacion->resultados[0]->correcta==1){echo "correcta";}else{ echo "incorrecta";} ?></td>
						<td><?= round($total2) ?></td>
						<?php $total=$total+$total2; ?>
					<?php endif; ?>
				<?php endif; ?>
				<?php if(!empty($evaluacion->revisados)): ?>
					<td><?php if($evaluacion->revisados[0]->punto>=($evaluacion->ponderacion/2)){echo "correcta";}else{ echo "incorrecta";} ?></td>
					<td><?= $evaluacion->revisados[0]->punto ?></td>
					<?php $total=$total+$evaluacion->revisados[0]->punto; ?>
				<?php endif; ?>
				<?php if(empty($evaluacion->revisados) && empty($evaluacion->resultados)): ?>
				<td>No respondio</td>
				<td>0</td>
				<?php endif; ?>
			</tr>
		<?php endforeach ?>
			<tr>
				<td>Nota Total: <?= round($total) ?>
					<?php if(round($total)>=55): ?>
						<img src="../../img/chulo.png">
					<?php else: ?> 
						<img src="../../img/chulomalo.png">
					<?php endif; ?>
				</td>
			</tr>
		<?php else: ?>
			<tr><td>
			<div class="alert alert-warning">
	          <center><strong>Las respuestas escritas aun no han sido corregidas</strong> Por favor espere a que su profesor realize esta labor.</center>
	        </div>
	        </td></tr>
		<?php endif; ?>
		</tbody>
		</table>
		</div>
	<?php endforeach ?>

	
	
</div>