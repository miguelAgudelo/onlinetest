<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Revisados'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Resultados'), ['controller' => 'Resultados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Resultado'), ['controller' => 'Resultados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="revisados form large-9 medium-8 columns content">
    <?= $this->Form->create($revisado) ?>
    <fieldset>
        <legend><?= __('Add Revisado') ?></legend>
        <?php
            echo $this->Form->input('texto');
            echo $this->Form->input('corregido');
            echo $this->Form->input('evaluacionpregunta_id');
            echo $this->Form->input('puntos');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
