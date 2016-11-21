<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $resultado->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $resultado->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Resultados'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Evaluacionpreguntas'), ['controller' => 'Evaluacionpreguntas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluacionpregunta'), ['controller' => 'Evaluacionpreguntas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Respuestas'), ['controller' => 'Respuestas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Respuesta'), ['controller' => 'Respuestas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resultados form large-9 medium-8 columns content">
    <?= $this->Form->create($resultado) ?>
    <fieldset>
        <legend><?= __('Edit Resultado') ?></legend>
        <?php
            echo $this->Form->input('evaluacionpregunta_id', ['options' => $evaluacionpreguntas]);
            echo $this->Form->input('respuesta_id', ['options' => $respuestas]);
            echo $this->Form->input('correcta');
            echo $this->Form->input('puntos');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
