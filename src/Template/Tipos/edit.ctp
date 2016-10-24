<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tipo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tipo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tipos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Preguntas'), ['controller' => 'Preguntas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pregunta'), ['controller' => 'Preguntas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Respuestas'), ['controller' => 'Respuestas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Respuesta'), ['controller' => 'Respuestas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipos form large-9 medium-8 columns content">
    <?= $this->Form->create($tipo) ?>
    <fieldset>
        <legend><?= __('Edit Tipo') ?></legend>
        <?php
            echo $this->Form->input('tip');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
