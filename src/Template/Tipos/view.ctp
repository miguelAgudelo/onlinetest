<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipo'), ['action' => 'edit', $tipo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipo'), ['action' => 'delete', $tipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Preguntas'), ['controller' => 'Preguntas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pregunta'), ['controller' => 'Preguntas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Respuestas'), ['controller' => 'Respuestas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respuesta'), ['controller' => 'Respuestas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipos view large-9 medium-8 columns content">
    <h3><?= h($tipo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Tip') ?></th>
            <td><?= h($tipo->tip) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tipo->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($tipo->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($tipo->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Preguntas') ?></h4>
        <?php if (!empty($tipo->preguntas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Texto') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Dir') ?></th>
                <th><?= __('Categoria Id') ?></th>
                <th><?= __('Nivel Id') ?></th>
                <th><?= __('Tipo Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tipo->preguntas as $preguntas): ?>
            <tr>
                <td><?= h($preguntas->id) ?></td>
                <td><?= h($preguntas->texto) ?></td>
                <td><?= h($preguntas->photo) ?></td>
                <td><?= h($preguntas->dir) ?></td>
                <td><?= h($preguntas->categoria_id) ?></td>
                <td><?= h($preguntas->nivel_id) ?></td>
                <td><?= h($preguntas->tipo_id) ?></td>
                <td><?= h($preguntas->created) ?></td>
                <td><?= h($preguntas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Preguntas', 'action' => 'view', $preguntas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Preguntas', 'action' => 'edit', $preguntas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Preguntas', 'action' => 'delete', $preguntas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $preguntas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Respuestas') ?></h4>
        <?php if (!empty($tipo->respuestas)): ?>
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
            <?php foreach ($tipo->respuestas as $respuestas): ?>
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
