<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Evaluacionpregunta'), ['action' => 'edit', $evaluacionpregunta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Evaluacionpregunta'), ['action' => 'delete', $evaluacionpregunta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evaluacionpregunta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Evaluacionpreguntas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evaluacionpregunta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Preguntas'), ['controller' => 'Preguntas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pregunta'), ['controller' => 'Preguntas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="evaluacionpreguntas view large-9 medium-8 columns content">
    <h3><?= h($evaluacionpregunta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Evaluacion') ?></th>
            <td><?= $evaluacionpregunta->has('evaluacion') ? $this->Html->link($evaluacionpregunta->evaluacion->id, ['controller' => 'Evaluacions', 'action' => 'view', $evaluacionpregunta->evaluacion->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pregunta') ?></th>
            <td><?= $evaluacionpregunta->has('pregunta') ? $this->Html->link($evaluacionpregunta->pregunta->id, ['controller' => 'Preguntas', 'action' => 'view', $evaluacionpregunta->pregunta->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($evaluacionpregunta->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($evaluacionpregunta->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($evaluacionpregunta->modified) ?></td>
        </tr>
    </table>
</div>
