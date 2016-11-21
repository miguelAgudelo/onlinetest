<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Presentado'), ['action' => 'edit', $presentado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Presentado'), ['action' => 'delete', $presentado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $presentado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Presentados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Presentado'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="presentados view large-9 medium-8 columns content">
    <h3><?= h($presentado->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $presentado->has('user') ? $this->Html->link($presentado->user->id, ['controller' => 'Users', 'action' => 'view', $presentado->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Evaluacion') ?></th>
            <td><?= $presentado->has('evaluacion') ? $this->Html->link($presentado->evaluacion->nombre, ['controller' => 'Evaluacions', 'action' => 'view', $presentado->evaluacion->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($presentado->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Presenta') ?></th>
            <td><?= $this->Number->format($presentado->presenta) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($presentado->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($presentado->modified) ?></td>
        </tr>
    </table>
</div>
