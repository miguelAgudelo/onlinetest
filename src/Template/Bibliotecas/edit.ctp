<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $biblioteca->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $biblioteca->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bibliotecas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bibliotecas form large-9 medium-8 columns content">
    <?= $this->Form->create($biblioteca) ?>
    <fieldset>
        <legend><?= __('Edit Biblioteca') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('categoria_id', ['options' => $categorias]);
            echo $this->Form->input('photo');
            echo $this->Form->input('dir');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
