<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Biblioteca'), ['action' => 'edit', $biblioteca->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Biblioteca'), ['action' => 'delete', $biblioteca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $biblioteca->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bibliotecas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Biblioteca'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bibliotecas view large-9 medium-8 columns content">
    <h3><?= h($biblioteca->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $biblioteca->has('user') ? $this->Html->link($biblioteca->user->id, ['controller' => 'Users', 'action' => 'view', $biblioteca->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Categoria') ?></th>
            <td><?= $biblioteca->has('categoria') ? $this->Html->link($biblioteca->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $biblioteca->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($biblioteca->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Dir') ?></th>
            <td><?= h($biblioteca->dir) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($biblioteca->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($biblioteca->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($biblioteca->modified) ?></td>
        </tr>
    </table>
</div>
