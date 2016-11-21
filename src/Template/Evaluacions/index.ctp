
<div class="container-fluid">
    <center><h3><?= __('Evaluaciones') ?></h3></center>
    <br>
    <table  class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('ponderada') ?></th>
               
                <th><?= $this->Paginator->sort('categoria_id') ?></th>
                <th><?= $this->Paginator->sort('creada') ?></th>
                
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evaluacions as $evaluacion): ?>
            <tr>
                <td><?= $this->Number->format($evaluacion->id) ?></td>
                <td><?= h($evaluacion->nombre) ?></td>
                <td><?= h($evaluacion->ponderada) ?></td>
                
                <td><?= $evaluacion->has('categoria') ? $this->Html->link($evaluacion->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $evaluacion->categoria->id]) : '' ?></td>
                <td><?= h($evaluacion->created) ?></td>
               
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $evaluacion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $evaluacion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $evaluacion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evaluacion->id)]) ?>
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
