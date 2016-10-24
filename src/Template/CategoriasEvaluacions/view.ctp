<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categorias Evaluacion'), ['action' => 'edit', $categoriasEvaluacion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categorias Evaluacion'), ['action' => 'delete', $categoriasEvaluacion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriasEvaluacion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorias Evaluacions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categorias Evaluacion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categoriasEvaluacions view large-9 medium-8 columns content">
    <h3><?= h($categoriasEvaluacion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Categoria') ?></th>
            <td><?= $categoriasEvaluacion->has('categoria') ? $this->Html->link($categoriasEvaluacion->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $categoriasEvaluacion->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Evaluacion') ?></th>
            <td><?= $categoriasEvaluacion->has('evaluacion') ? $this->Html->link($categoriasEvaluacion->evaluacion->id, ['controller' => 'Evaluacions', 'action' => 'view', $categoriasEvaluacion->evaluacion->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoriasEvaluacion->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($categoriasEvaluacion->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($categoriasEvaluacion->modified) ?></td>
        </tr>
    </table>
</div>
