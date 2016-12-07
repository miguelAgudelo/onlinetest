
<div class="container2">
    <h3><?= h($categoria->nombre) ?></h3>
    <div class="col-md-12">
        fecha de creacion: <?= h($categoria->created) ?> 
    </div>
    <div class="col-md-12">
         fecha de modificacion:<?= h($categoria->modified) ?>
    </div>
    <div class="related">
        <center><h4><?= __('Preguntas de la materia') ?></h4></center>
        <?php if (!empty($categoria->preguntas)): ?>
        <table id="mitabla">
        <thead id="mith">
            <tr>
               
                <th><?= __('Texto') ?></th>
                <th><?= __('Creada') ?></th>
                <th><?= __('Modificada') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody id="mitb">
            <?php foreach ($categoria->preguntas as $preguntas): ?>
            <tr>
               
                <td><?= h($preguntas->texto) ?></td>
                <td><?= h($preguntas->created) ?></td>
                <td><?= h($preguntas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Preguntas', 'action' => 'view', $preguntas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Preguntas', 'action' => 'edit', $preguntas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Preguntas', 'action' => 'delete', $preguntas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $preguntas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <center><h4><?= __('Evaluaciones de la materia') ?></h4></center>
        <?php if (!empty($categoria->evaluacions)): ?>
        <table id="mitabla">
        <thead id="mith">
            <tr>
                
                <th><?= __('Nombre') ?></th>
                <th><?= __('Ponderada') ?></th>
                <th><?= __('creada') ?></th>
                <th><?= __('modificada') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody id="mitb">
            <?php foreach ($categoria->evaluacions as $evaluacions): ?>
            <tr>
                
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
        </tbody>
        <?php endif; ?>
    </div>
</div>
