<div class="container2">
	<center><h4>Resultados de la evaluacion <?= $evaluacion->nombre ?></h4></center>
	<?php foreach ($notas as $user): ?>
		<?php  $total=0; ?>
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
			<tr>
				<td><?= $evaluacion->pregunta->texto ?></td>
				<?php if(!empty($evaluacion->resultados)): ?>
				<td><?php if($evaluacion->resultados[0]->correcta==1){echo "correcta";}else{ echo "incorrecta";} ?></td>
				<td><?= $evaluacion->resultados[0]->puntos ?></td>
				<?php $total=$total+$evaluacion->resultados[0]->puntos; ?>
				<?php else: ?>
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
		</tbody>
		</table>
		</div>
	<?php endforeach ?>

	
	
</div>