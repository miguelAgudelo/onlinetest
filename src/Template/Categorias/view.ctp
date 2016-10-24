<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categoria'), ['action' => 'edit', $categoria->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Preguntas'), ['controller' => 'Preguntas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pregunta'), ['controller' => 'Preguntas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evaluacions'), ['controller' => 'Evaluacions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evaluacion'), ['controller' => 'Evaluacions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorias view large-9 medium-8 columns content">
    <h3><?= h($categoria->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($categoria->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoria->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($categoria->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($categoria->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Preguntas') ?></h4>
        <?php if (!empty($categoria->preguntas)): ?>
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
            <?php foreach ($categoria->preguntas as $preguntas): ?>
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
        <h4><?= __('Related Evaluacions') ?></h4>
        <?php if (!empty($categoria->evaluacions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Ponderada') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoria->evaluacions as $evaluacions): ?>
            <tr>
                <td><?= h($evaluacions->id) ?></td>
                <td><?= h($evaluacions->nombre) ?></td>
                <td><?= h($evaluacions->ponderada) ?></td>
                <td><?= h($evaluacions->created) ?></td>
                <td><?= h($evaluacions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Evaluacions', 'action' => 'view', $evaluacions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Evaluacions', 'action' => 'edit', $evaluacions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Evaluacions', 'action' => 'delete', $evaluacions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evaluacions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
