<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Categoriauser'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categoriausers index large-9 medium-8 columns content">
    <h3><?= __('Categoriausers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('categoria_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categoriausers as $categoriauser): ?>
            <tr>
                <td><?= $this->Number->format($categoriauser->id) ?></td>
                <td><?= $categoriauser->has('user') ? $this->Html->link($categoriauser->user->id, ['controller' => 'Users', 'action' => 'view', $categoriauser->user->id]) : '' ?></td>
                <td><?= $categoriauser->has('categoria') ? $this->Html->link($categoriauser->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $categoriauser->categoria->id]) : '' ?></td>
                <td><?= h($categoriauser->created) ?></td>
                <td><?= h($categoriauser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $categoriauser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $categoriauser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $categoriauser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriauser->id)]) ?>
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
