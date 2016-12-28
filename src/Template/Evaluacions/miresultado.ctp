
<div class="container1">
    <?php if(count($evaluacions)>0): ?>
    <center><h3><?= __('Evaluaciones que has presentado') ?></h3></center>
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

                    <?= $this->Html->link(__('Mi nota'), ['action' => 'minota', $evaluacion->id],['class' => 'btn btn-sm btn-info']) ?>    
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