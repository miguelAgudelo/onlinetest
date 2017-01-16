
<div class="container1">
    <?php if(count($evaluacions)>0): ?>
    <center><h3><?= __('Evaluaciones') ?></h3></center>
    <br>
    <table  id="mitabla">
        <thead id="mith">
            <tr>
              
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('ponderada') ?></th>
               
                <th><?= $this->Paginator->sort('materia') ?></th>
                <th><?= $this->Paginator->sort('creada') ?></th>
                
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody id="mitb">
            <?php foreach ($evaluacions as $evaluacion): ?>
            <tr>
                
                <td><?= h($evaluacion->nombre) ?></td>
                <td><?= h($evaluacion->ponderada) ?></td>
                
                <td><?= $evaluacion->has('categoria') ? $this->Html->link($evaluacion->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $evaluacion->categoria->id]) : '' ?></td>
                <td><?= h($evaluacion->created) ?></td>
               
                <td class="btn-group"> 

                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $evaluacion->id],['class' => 'btn btn-sm btn-info']) ?>    

                    <?php if($role=='admin'): ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $evaluacion->id],['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Revisar'), ['action' => 'revisar', $evaluacion->id],['class' => 'btn btn-sm btn-info']) ?>  
                    <?= $this->Html->link(__('Resultados'), ['action' => 'veresultado', $evaluacion->id],['class' => 'btn btn-sm btn-info']) ?>  
                    <?php echo $this->Form->postLink(__('<i class="fa fa-trash">Eliminar</i>'), array('action' => 'delete', $evaluacion->id), array('class' => 'btn btn-sm btn-success', 'escape' => false, 'button title' => 'ELIMINAR'), array('confirm' => __('Are you sure you want to delete # {0}?', $evaluacion->id))); ?>
                     <?php endif; ?>  
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Proximo') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    <?php else: ?>
        <br><br>
        <div class="alert alert-warning">
          <center><strong>Usted aun no ha sido asignado a ninguna materia!</strong> Por favor espere a que los administrador realizen esta labor.</center>
        </div>
    <?php endif; ?>
</div>
