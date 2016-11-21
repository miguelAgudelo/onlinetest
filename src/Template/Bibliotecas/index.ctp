<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Biblioteca'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bibliotecas index large-9 medium-8 columns content">
    <h3><?= __('Bibliotecas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('categoria_id') ?></th>
                <th><?= $this->Paginator->sort('photo') ?></th>
                <th><?= $this->Paginator->sort('dir') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bibliotecas as $biblioteca): ?>
            <tr>
                <td><?= $this->Number->format($biblioteca->id) ?></td>
                <td><?= $biblioteca->has('user') ? $this->Html->link($biblioteca->user->id, ['controller' => 'Users', 'action' => 'view', $biblioteca->user->id]) : '' ?></td>
                <td><?= $biblioteca->has('categoria') ? $this->Html->link($biblioteca->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $biblioteca->categoria->id]) : '' ?></td>
                <td><?= h($biblioteca->photo) ?></td>
                <td><?= h($biblioteca->dir) ?></td>
                <td><?= h($biblioteca->created) ?></td>
                <td><?= h($biblioteca->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $biblioteca->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $biblioteca->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $biblioteca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $biblioteca->id)]) ?>
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
