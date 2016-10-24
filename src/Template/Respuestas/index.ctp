
<div class="container-fluid">
    <center><h3><?= __('Respuestas') ?></h3></center>
    <table  class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pregunta') ?></th>
                <th><?= $this->Paginator->sort('texto') ?></th>
                <th><?= $this->Paginator->sort('correcta') ?></th>
                <th><?= $this->Paginator->sort('creada') ?></th>
               
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($respuestas as $respuesta): ?>
            <tr>
                <td><?= $this->Number->format($respuesta->id) ?></td>
                <td><?= $respuesta->has('pregunta') ? $this->Html->link($respuesta->pregunta->texto, ['controller' => 'Preguntas', 'action' => 'view', $respuesta->pregunta->id]) : '' ?></td>
                <td><?= h($respuesta->texto) ?></td>
                <td><?= h($respuesta->correcta) ?></td>
                <td><?= h($respuesta->created) ?></td>
                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $respuesta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $respuesta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $respuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respuesta->id)]) ?>
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
