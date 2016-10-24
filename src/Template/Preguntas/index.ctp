
<div class="container-fluid">
    <center><h3><?= __('Preguntas') ?></h3></center>
    <br>
    <table  class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('texto') ?></th>
                
                <th><?= $this->Paginator->sort('categoria') ?></th>
                <th><?= $this->Paginator->sort('nivel') ?></th>
                
                <th><?= $this->Paginator->sort('creada') ?></th>
               
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($preguntas as $pregunta): ?>
            <tr>
                <td><?= $this->Number->format($pregunta->id) ?></td>
                <td><?= h($pregunta->texto) ?></td>
          
                <td><?= $pregunta->has('categoria') ? $this->Html->link($pregunta->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $pregunta->categoria->id]) : '' ?></td>
                <td><?= $pregunta->has('nivel') ? $this->Html->link($pregunta->nivel->dificultad, ['controller' => 'Nivels', 'action' => 'view', $pregunta->nivel->id]) : '' ?></td>
                
                <td><?= h($pregunta->created) ?></td>
               
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pregunta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pregunta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pregunta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pregunta->id)]) ?>
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
