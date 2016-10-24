<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nivel'), ['action' => 'edit', $nivel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nivel'), ['action' => 'delete', $nivel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nivel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nivels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nivel'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Preguntas'), ['controller' => 'Preguntas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pregunta'), ['controller' => 'Preguntas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nivels view large-9 medium-8 columns content">
    <h3><?= h($nivel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Dificultad') ?></th>
            <td><?= h($nivel->dificultad) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($nivel->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($nivel->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($nivel->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Preguntas') ?></h4>
        <?php if (!empty($nivel->preguntas)): ?>
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
            <?php foreach ($nivel->preguntas as $preguntas): ?>
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
</div>
