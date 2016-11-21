<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Presentados'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="presentados form large-9 medium-8 columns content">
    <?= $this->Form->create($presentado) ?>
    <fieldset>
        <legend><?= __('Add Presentado') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('evaluacion_id', ['options' => $evaluacions]);
            echo $this->Form->input('presenta');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
