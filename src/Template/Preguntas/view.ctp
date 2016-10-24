<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pregunta'), ['action' => 'edit', $pregunta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pregunta'), ['action' => 'delete', $pregunta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pregunta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Preguntas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pregunta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nivels'), ['controller' => 'Nivels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nivel'), ['controller' => 'Nivels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tipos'), ['controller' => 'Tipos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo'), ['controller' => 'Tipos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evaluacionpreguntas'), ['controller' => 'Evaluacionpreguntas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evaluacionpregunta'), ['controller' => 'Evaluacionpreguntas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Respuestas'), ['controller' => 'Respuestas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respuesta'), ['controller' => 'Respuestas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="preguntas view large-9 medium-8 columns content">
    <h3><?= h($pregunta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Texto') ?></th>
            <td><?= h($pregunta->texto) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($pregunta->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Dir') ?></th>
            <td><?= h($pregunta->dir) ?></td>
        </tr>
        <tr>
            <th><?= __('Categoria') ?></th>
            <td><?= $pregunta->has('categoria') ? $this->Html->link($pregunta->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $pregunta->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Nivel') ?></th>
            <td><?= $pregunta->has('nivel') ? $this->Html->link($pregunta->nivel->id, ['controller' => 'Nivels', 'action' => 'view', $pregunta->nivel->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $pregunta->has('tipo') ? $this->Html->link($pregunta->tipo->id, ['controller' => 'Tipos', 'action' => 'view', $pregunta->tipo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pregunta->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pregunta->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pregunta->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Evaluacionpreguntas') ?></h4>
        <?php if (!empty($pregunta->evaluacionpreguntas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Evaluacion Id') ?></th>
                <th><?= __('Pregunta Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pregunta->evaluacionpreguntas as $evaluacionpreguntas): ?>
            <tr>
                <td><?= h($evaluacionpreguntas->id) ?></td>
                <td><?= h($evaluacionpreguntas->evaluacion_id) ?></td>
                <td><?= h($evaluacionpreguntas->pregunta_id) ?></td>
                <td><?= h($evaluacionpreguntas->created) ?></td>
                <td><?= h($evaluacionpreguntas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Evaluacionpreguntas', 'action' => 'view', $evaluacionpreguntas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Evaluacionpreguntas', 'action' => 'edit', $evaluacionpreguntas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Evaluacionpreguntas', 'action' => 'delete', $evaluacionpreguntas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evaluacionpreguntas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Respuestas') ?></h4>
        <?php if (!empty($pregunta->respuestas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Pregunta Id') ?></th>
                <th><?= __('Texto') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Dir') ?></th>
                <th><?= __('Tipo Id') ?></th>
                <th><?= __('Correcta') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pregunta->respuestas as $respuestas): ?>
            <tr>
                <td><?= h($respuestas->id) ?></td>
                <td><?= h($respuestas->pregunta_id) ?></td>
                <td><?= h($respuestas->texto) ?></td>
                <td><?= h($respuestas->photo) ?></td>
                <td><?= h($respuestas->dir) ?></td>
                <td><?= h($respuestas->tipo_id) ?></td>
                <td><?= h($respuestas->correcta) ?></td>
                <td><?= h($respuestas->created) ?></td>
                <td><?= h($respuestas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Respuestas', 'action' => 'view', $respuestas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Respuestas', 'action' => 'edit', $respuestas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Respuestas', 'action' => 'delete', $respuestas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respuestas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
