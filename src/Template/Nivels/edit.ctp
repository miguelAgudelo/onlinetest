<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $nivel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nivel->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Nivels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Preguntas'), ['controller' => 'Preguntas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pregunta'), ['controller' => 'Preguntas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nivels form large-9 medium-8 columns content">
    <?= $this->Form->create($nivel) ?>
    <fieldset>
        <legend><?= __('Edit Nivel') ?></legend>
        <?php
            echo $this->Form->input('dificultad');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
