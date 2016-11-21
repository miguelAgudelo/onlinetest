<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categoriauser'), ['action' => 'edit', $categoriauser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categoriauser'), ['action' => 'delete', $categoriauser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriauser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categoriausers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoriauser'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categoriausers view large-9 medium-8 columns content">
    <h3><?= h($categoriauser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $categoriauser->has('user') ? $this->Html->link($categoriauser->user->id, ['controller' => 'Users', 'action' => 'view', $categoriauser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Categoria') ?></th>
            <td><?= $categoriauser->has('categoria') ? $this->Html->link($categoriauser->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $categoriauser->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoriauser->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($categoriauser->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($categoriauser->modified) ?></td>
        </tr>
    </table>
</div>
