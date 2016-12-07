<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pregunta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pregunta->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Preguntas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nivels'), ['controller' => 'Nivels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nivel'), ['controller' => 'Nivels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipos'), ['controller' => 'Tipos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo'), ['controller' => 'Tipos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evaluacionpreguntas'), ['controller' => 'Evaluacionpreguntas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluacionpregunta'), ['controller' => 'Evaluacionpreguntas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Respuestas'), ['controller' => 'Respuestas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Respuesta'), ['controller' => 'Respuestas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="preguntas form large-9 medium-8 columns content">
    <?= $this->Form->create($pregunta) ?>
    <fieldset>
        <legend><?= __('Edit Pregunta') ?></legend>
        <?php
            echo $this->Form->input('texto');
            echo $this->Form->input('photo');
            echo $this->Form->input('dir');
            echo $this->Form->input('categoria_id', ['options' => $categorias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
