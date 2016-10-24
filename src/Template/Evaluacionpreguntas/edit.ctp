<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $evaluacionpregunta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $evaluacionpregunta->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Evaluacionpreguntas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Preguntas'), ['controller' => 'Preguntas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pregunta'), ['controller' => 'Preguntas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="evaluacionpreguntas form large-9 medium-8 columns content">
    <?= $this->Form->create($evaluacionpregunta) ?>
    <fieldset>
        <legend><?= __('Edit Evaluacionpregunta') ?></legend>
        <?php
            echo $this->Form->input('evaluacion_id', ['options' => $evaluacions]);
            echo $this->Form->input('pregunta_id', ['options' => $preguntas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
