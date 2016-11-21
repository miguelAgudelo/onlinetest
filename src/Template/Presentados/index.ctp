<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Presentado'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="presentados index large-9 medium-8 columns content">
    <h3><?= __('Presentados') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('evaluacion_id') ?></th>
                <th><?= $this->Paginator->sort('presenta') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($presentados as $presentado): ?>
            <tr>
                <td><?= $this->Number->format($presentado->id) ?></td>
                <td><?= $presentado->has('user') ? $this->Html->link($presentado->user->id, ['controller' => 'Users', 'action' => 'view', $presentado->user->id]) : '' ?></td>
                <td><?= $presentado->has('evaluacion') ? $this->Html->link($presentado->evaluacion->nombre, ['controller' => 'Evaluacions', 'action' => 'view', $presentado->evaluacion->id]) : '' ?></td>
                <td><?= $this->Number->format($presentado->presenta) ?></td>
                <td><?= h($presentado->created) ?></td>
                <td><?= h($presentado->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $presentado->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $presentado->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $presentado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $presentado->id)]) ?>
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
