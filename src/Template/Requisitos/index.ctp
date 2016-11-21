<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requisito'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requisitos index large-9 medium-8 columns content">
    <h3><?= __('Requisitos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('evaluacion_id') ?></th>
                <th><?= $this->Paginator->sort('nivel') ?></th>
                <th><?= $this->Paginator->sort('tipo') ?></th>
                <th><?= $this->Paginator->sort('cantidad') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requisitos as $requisito): ?>
            <tr>
                <td><?= $this->Number->format($requisito->id) ?></td>
                <td><?= $requisito->has('evaluacion') ? $this->Html->link($requisito->evaluacion->nombre, ['controller' => 'Evaluacions', 'action' => 'view', $requisito->evaluacion->id]) : '' ?></td>
                <td><?= $this->Number->format($requisito->nivel) ?></td>
                <td><?= $this->Number->format($requisito->tipo) ?></td>
                <td><?= $this->Number->format($requisito->cantidad) ?></td>
                <td><?= h($requisito->created) ?></td>
                <td><?= h($requisito->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requisito->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requisito->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requisito->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisito->id)]) ?>
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
