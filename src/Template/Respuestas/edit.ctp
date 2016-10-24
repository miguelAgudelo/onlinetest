<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $respuesta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $respuesta->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Respuestas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Preguntas'), ['controller' => 'Preguntas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pregunta'), ['controller' => 'Preguntas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipos'), ['controller' => 'Tipos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo'), ['controller' => 'Tipos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="respuestas form large-9 medium-8 columns content">
    <?= $this->Form->create($respuesta) ?>
    <fieldset>
        <legend><?= __('Edit Respuesta') ?></legend>
        <?php
            echo $this->Form->input('pregunta_id', ['options' => $preguntas]);
            echo $this->Form->input('texto');
            echo $this->Form->input('photo');
            echo $this->Form->input('dir');
            echo $this->Form->input('tipo_id', ['options' => $tipos]);
            echo $this->Form->input('correcta');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
