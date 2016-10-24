<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Categorias Evaluacion'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categoriasEvaluacions index large-9 medium-8 columns content">
    <h3><?= __('Categorias Evaluacions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('categoria_id') ?></th>
                <th><?= $this->Paginator->sort('evaluacion_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categoriasEvaluacions as $categoriasEvaluacion): ?>
            <tr>
                <td><?= $this->Number->format($categoriasEvaluacion->id) ?></td>
                <td><?= $categoriasEvaluacion->has('categoria') ? $this->Html->link($categoriasEvaluacion->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $categoriasEvaluacion->categoria->id]) : '' ?></td>
                <td><?= $categoriasEvaluacion->has('evaluacion') ? $this->Html->link($categoriasEvaluacion->evaluacion->id, ['controller' => 'Evaluacions', 'action' => 'view', $categoriasEvaluacion->evaluacion->id]) : '' ?></td>
                <td><?= h($categoriasEvaluacion->created) ?></td>
                <td><?= h($categoriasEvaluacion->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $categoriasEvaluacion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $categoriasEvaluacion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $categoriasEvaluacion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriasEvaluacion->id)]) ?>
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
