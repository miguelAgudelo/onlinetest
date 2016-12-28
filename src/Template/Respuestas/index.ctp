
<div class="container1">
    <center><h3><?= __('Respuestas') ?></h3></center>
    <table  id="mitabla">
        <thead id="mith">
            <tr>
               
                <th><?= $this->Paginator->sort('pregunta') ?></th>
                <th><?= $this->Paginator->sort('texto') ?></th>
                <th><?= $this->Paginator->sort('correcta') ?></th>
                <th><?= $this->Paginator->sort('creada') ?></th>
               
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
         <tbody id="mitb">
            <?php foreach ($respuestas as $respuesta): ?>
            <tr>
                
                <td><?= $respuesta->has('pregunta') ? $this->Html->link($respuesta->pregunta->texto, ['controller' => 'Preguntas', 'action' => 'view', $respuesta->pregunta->id]) : '' ?></td>
                <td><?= h($respuesta->texto) ?></td>
                <td><?php if($respuesta->correcta==1){echo "correcta";}else{ echo "incorrecta";} ?></td>
                <td><?= h($respuesta->created) ?></td>
                
                <td class="btn-group"> 

                    

                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $respuesta->id],['class' => 'btn btn-sm btn-info']) ?> 

                   <?php echo $this->Form->postLink(__('<i class="fa fa-trash">Eliminar</i>'), array('action' => 'delete', $respuesta->id), array('class' => 'btn btn-sm btn-success', 'escape' => false, 'button title' => 'ELIMINAR'), array('confirm' => __('Are you sure you want to delete # {0}?', $respuesta->id))); ?>  



                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
