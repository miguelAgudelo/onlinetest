<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Evaluacionpregunta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Preguntas'), ['controller' => 'Preguntas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pregunta'), ['controller' => 'Preguntas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="evaluacionpreguntas index large-9 medium-8 columns content">
    <h3><?= __('Evaluacionpreguntas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('evaluacion_id') ?></th>
                <th><?= $this->Paginator->sort('pregunta_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evaluacionpreguntas as $evaluacionpregunta): ?>
            <tr>
                <td><?= $this->Number->format($evaluacionpregunta->id) ?></td>
                <td><?= $evaluacionpregunta->has('evaluacion') ? $this->Html->link($evaluacionpregunta->evaluacion->nombre, ['controller' => 'Evaluacions', 'action' => 'view', $evaluacionpregunta->evaluacion->id]) : '' ?></td>
                <td><?= $evaluacionpregunta->has('pregunta') ? $this->Html->link($evaluacionpregunta->pregunta->texto, ['controller' => 'Preguntas', 'action' => 'view', $evaluacionpregunta->pregunta->id]) : '' ?></td>
                <td><?= h($evaluacionpregunta->created) ?></td>
                <td><?= h($evaluacionpregunta->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $evaluacionpregunta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $evaluacionpregunta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $evaluacionpregunta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evaluacionpregunta->id)]) ?>
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
