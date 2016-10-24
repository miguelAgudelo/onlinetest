<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Respuesta'), ['action' => 'edit', $respuesta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Respuesta'), ['action' => 'delete', $respuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respuesta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Respuestas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respuesta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Preguntas'), ['controller' => 'Preguntas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pregunta'), ['controller' => 'Preguntas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tipos'), ['controller' => 'Tipos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo'), ['controller' => 'Tipos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="respuestas view large-9 medium-8 columns content">
    <h3><?= h($respuesta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pregunta') ?></th>
            <td><?= $respuesta->has('pregunta') ? $this->Html->link($respuesta->pregunta->id, ['controller' => 'Preguntas', 'action' => 'view', $respuesta->pregunta->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Texto') ?></th>
            <td><?= h($respuesta->texto) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($respuesta->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Dir') ?></th>
            <td><?= h($respuesta->dir) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $respuesta->has('tipo') ? $this->Html->link($respuesta->tipo->id, ['controller' => 'Tipos', 'action' => 'view', $respuesta->tipo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($respuesta->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($respuesta->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($respuesta->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Correcta') ?></th>
            <td><?= $respuesta->correcta ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
