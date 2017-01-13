<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Revisado'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Resultados'), ['controller' => 'Resultados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Resultado'), ['controller' => 'Resultados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="revisados index large-9 medium-8 columns content">
    <h3><?= __('Revisados') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('texto') ?></th>
                <th><?= $this->Paginator->sort('corregido') ?></th>
                <th><?= $this->Paginator->sort('evaluacionpregunta_id') ?></th>
                <th><?= $this->Paginator->sort('puntos') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($revisados as $revisado): ?>
            <tr>
                <td><?= $this->Number->format($revisado->id) ?></td>
                <td><?= h($revisado->texto) ?></td>
                <td><?= $this->Number->format($revisado->corregido) ?></td>
                <td><?= $this->Number->format($revisado->evaluacionpregunta_id) ?></td>
                <td><?= $this->Number->format($revisado->puntos) ?></td>
                <td><?= h($revisado->created) ?></td>
                <td><?= h($revisado->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $revisado->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $revisado->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $revisado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $revisado->id)]) ?>
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
