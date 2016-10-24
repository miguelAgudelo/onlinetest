<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $categoriasEvaluacion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $categoriasEvaluacion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categorias Evaluacions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categoriasEvaluacions form large-9 medium-8 columns content">
    <?= $this->Form->create($categoriasEvaluacion) ?>
    <fieldset>
        <legend><?= __('Edit Categorias Evaluacion') ?></legend>
        <?php
            echo $this->Form->input('categoria_id', ['options' => $categorias]);
            echo $this->Form->input('evaluacion_id', ['options' => $evaluacions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
