<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Resultado'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evaluacionpreguntas'), ['controller' => 'Evaluacionpreguntas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluacionpregunta'), ['controller' => 'Evaluacionpreguntas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Respuestas'), ['controller' => 'Respuestas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Respuesta'), ['controller' => 'Respuestas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resultados index large-9 medium-8 columns content">
    <h3><?= __('Resultados') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('evaluacionpregunta_id') ?></th>
                <th><?= $this->Paginator->sort('respuesta_id') ?></th>
                <th><?= $this->Paginator->sort('correcta') ?></th>
                <th><?= $this->Paginator->sort('puntos') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultados as $resultado): ?>
            <tr>
                <td><?= $this->Number->format($resultado->id) ?></td>
                <td><?= $resultado->has('evaluacionpregunta') ? $this->Html->link($resultado->evaluacionpregunta->id, ['controller' => 'Evaluacionpreguntas', 'action' => 'view', $resultado->evaluacionpregunta->id]) : '' ?></td>
                <td><?= $resultado->has('respuesta') ? $this->Html->link($resultado->respuesta->id, ['controller' => 'Respuestas', 'action' => 'view', $resultado->respuesta->id]) : '' ?></td>
                <td><?= $this->Number->format($resultado->correcta) ?></td>
                <td><?= $this->Number->format($resultado->puntos) ?></td>
                <td><?= $this->Number->format($resultado->created) ?></td>
                <td><?= $this->Number->format($resultado->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $resultado->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resultado->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $resultado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resultado->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
