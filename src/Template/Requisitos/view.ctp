<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requisito'), ['action' => 'edit', $requisito->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requisito'), ['action' => 'delete', $requisito->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisito->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requisitos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requisito'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requisitos view large-9 medium-8 columns content">
    <h3><?= h($requisito->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Evaluacion') ?></th>
            <td><?= $requisito->has('evaluacion') ? $this->Html->link($requisito->evaluacion->nombre, ['controller' => 'Evaluacions', 'action' => 'view', $requisito->evaluacion->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($requisito->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Nivel') ?></th>
            <td><?= $this->Number->format($requisito->nivel) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($requisito->tipo) ?></td>
        </tr>
        <tr>
            <th><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($requisito->cantidad) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($requisito->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($requisito->modified) ?></td>
        </tr>
    </table>
</div>
