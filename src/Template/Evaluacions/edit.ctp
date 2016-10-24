<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $evaluacion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $evaluacion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Evaluacionpreguntas'), ['controller' => 'Evaluacionpreguntas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluacionpregunta'), ['controller' => 'Evaluacionpreguntas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="evaluacions form large-9 medium-8 columns content">
    <?= $this->Form->create($evaluacion) ?>
    <fieldset>
        <legend><?= __('Edit Evaluacion') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('ponderada');
            echo $this->Form->input('cantidad');
            echo $this->Form->input('categoria_id');
            echo $this->Form->input('categorias._ids', ['options' => $categorias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
