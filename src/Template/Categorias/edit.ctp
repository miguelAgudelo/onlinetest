<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $categoria->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Preguntas'), ['controller' => 'Preguntas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pregunta'), ['controller' => 'Preguntas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categorias form large-9 medium-8 columns content">
    <?= $this->Form->create($categoria) ?>
    <fieldset>
        <legend><?= __('Edit Categoria') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('evaluacions._ids', ['options' => $evaluacions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
