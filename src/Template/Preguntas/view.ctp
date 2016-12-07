
<div class="container2">
    <h3><?= h($pregunta->texto) ?></h3>
    <div class="col-md-12">
            Materia: <?= $pregunta->has('categoria') ? $this->Html->link($pregunta->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $pregunta->categoria->id]) : '' ?>
    </div> 
    <div class="col-md-12">
        fecha de creacion: <?= h($pregunta->created) ?> 
    </div>
    <div class="col-md-12">
         fecha de modificacion:<?= h($pregunta->modified) ?>
    </div>
    <br><br>
        
        <?php if (!empty($pregunta->respuestas)): ?>
        <center><h5><?= __('Posibles Respuestas') ?></h5></center>
        <table id="mitabla">
        <thead id="mith">
            <tr>
                <th><?= __('Pregunta') ?></th>
                <th><?= __('Texto') ?></th>
                <th><?= __('Correcta') ?></th>
                <th><?= __('creada') ?></th>
                <th><?= __('modificada') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody id="mitb">
            <?php foreach ($pregunta->respuestas as $respuestas): ?>
            <tr>
          
                <td><?= h($respuestas->pregunta_id) ?></td>
                <td><?= h($respuestas->texto) ?></td>
                <td><?php if($respuestas->correcta==1){echo "correcta";}else{ echo "incorrecta";} ?></td>
                <td><?= h($respuestas->created) ?></td>
                <td><?= h($respuestas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Respuestas', 'action' => 'view', $respuestas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Respuestas', 'action' => 'edit', $respuestas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Respuestas', 'action' => 'delete', $respuestas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respuestas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>
