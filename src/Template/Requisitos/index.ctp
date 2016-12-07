
<div class="container1">
    <center><h3><?= __('Requisitos') ?></h3></center>
     <table  id="mitabla">
        <thead id="mith">
            <tr>
               
                <th><?= $this->Paginator->sort('evaluacion') ?></th>
                <th><?= $this->Paginator->sort('nivel') ?></th>
                <th><?= $this->Paginator->sort('tipo') ?></th>
                <th><?= $this->Paginator->sort('cantidad') ?></th>
                <th><?= $this->Paginator->sort('creado') ?></th>
                <th><?= $this->Paginator->sort('modificado') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody id="mitb">
            <?php foreach ($requisitos as $requisito): ?>
            <tr>
                
                <td><?= $requisito->has('evaluacion') ? $this->Html->link($requisito->evaluacion->nombre, ['controller' => 'Evaluacions', 'action' => 'view', $requisito->evaluacion->id]) : '' ?></td>
                <td><?= $this->Number->format($requisito->nivel) ?></td>
                <td><?= $this->Number->format($requisito->tipo) ?></td>
                <td><?= $this->Number->format($requisito->cantidad) ?></td>
                <td><?= h($requisito->created) ?></td>
                <td><?= h($requisito->modified) ?></td>
                <td class="actions">
                   
                     <?= $this->Html->link(__('Ver'), ['action' => 'view',$requisito->id],['class' => 'btn btn-sm btn-info']) ?> 
                     <?php echo $this->Form->postLink(__('<i class="fa fa-trash">Eliminar</i>'), array('action' => 'delete', $requisito->id), array('class' => 'btn btn-sm btn-success', 'escape' => false, 'button title' => 'ELIMINAR'), array('confirm' => __('Are you sure you want to delete # {0}?', $requisito->id))); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
