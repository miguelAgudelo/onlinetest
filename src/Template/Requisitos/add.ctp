<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requisitos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requisitos form large-9 medium-8 columns content">
    <?= $this->Form->create($requisito) ?>
    <fieldset>
        <legend><?= __('Add Requisito') ?></legend>
        <?php
            echo $this->Form->input('evaluacion_id', ['options' => $evaluacions]);
            echo $this->Form->input('nivel');
            echo $this->Form->input('tipo');
            echo $this->Form->input('cantidad');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
