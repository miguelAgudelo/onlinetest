
<div class="preguntas view large-9 medium-8 columns content">
    <h3><?= h($pregunta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Texto') ?></th>
            <td><?= h($pregunta->texto) ?></td>
        </tr>
        
        <tr>
            <th><?= __('Categoria') ?></th>
            <td><?= $pregunta->has('categoria') ? $this->Html->link($pregunta->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $pregunta->categoria->id]) : '' ?></td>
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
