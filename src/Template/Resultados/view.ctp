<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Resultado'), ['action' => 'edit', $resultado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Resultado'), ['action' => 'delete', $resultado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resultado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Resultados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Resultado'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evaluacionpreguntas'), ['controller' => 'Evaluacionpreguntas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evaluacionpregunta'), ['controller' => 'Evaluacionpreguntas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Respuestas'), ['controller' => 'Respuestas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respuesta'), ['controller' => 'Respuestas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="resultados view large-9 medium-8 columns content">
    <h3><?= h($resultado->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Evaluacionpregunta') ?></th>
            <td><?= $resultado->has('evaluacionpregunta') ? $this->Html->link($resultado->evaluacionpregunta->id, ['controller' => 'Evaluacionpreguntas', 'action' => 'view', $resultado->evaluacionpregunta->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Respuesta') ?></th>
            <td><?= $resultado->has('respuesta') ? $this->Html->link($resultado->respuesta->id, ['controller' => 'Respuestas', 'action' => 'view', $resultado->respuesta->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($resultado->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Correcta') ?></th>
            <td><?= $this->Number->format($resultado->correcta) ?></td>
        </tr>
        <tr>
            <th><?= __('Puntos') ?></th>
            <td><?= $this->Number->format($resultado->puntos) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= $this->Number->format($resultado->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= $this->Number->format($resultado->modified) ?></td>
        </tr>
    </table>
</div>
