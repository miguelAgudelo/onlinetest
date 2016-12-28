<div class="container1">
    <center><h3><?= __('Preguntas') ?></h3></center>
    
    <table  id="mitabla">
        <thead id="mith">
            <tr>
                <th><?= $this->Paginator->sort('texto') ?></th>
                
                <th><?= $this->Paginator->sort('categoria') ?></th>
                <th><?= $this->Paginator->sort('nivel') ?></th>
                
                <th><?= $this->Paginator->sort('creada') ?></th>
               
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody id="mitb">
            <?php foreach ($preguntas as $pregunta): ?>
            <tr>
               
                <td><?= h($pregunta->texto) ?></td>
          
                <td><?= $pregunta->has('categoria') ? $this->Html->link($pregunta->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $pregunta->categoria->id]) : '' ?></td>
                <td><?php if($pregunta->nivel==1){ echo "facil";}elseif($pregunta->nivel==2){ echo "medio";}else{ echo "dificil";} ?></td>
                
                <td><?= h($pregunta->created) ?></td>
               
                <td class="btn-group"> 



                    <?= $this->Html->link(__('Ver'), ['action' => 'view',$pregunta->id],['class' => 'btn btn-sm btn-info']) ?> 





                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $pregunta->id],['class' => 'btn btn-sm btn-info']) ?> 


<?php echo $this->Form->postLink(__('<i class="fa fa-trash">Eliminar</i>'), array('action' => 'delete', $pregunta->id), array('class' => 'btn btn-sm btn-success', 'escape' => false, 'button title' => 'ELIMINAR'), array('confirm' => __('Are you sure you want to delete # {0}?', $pregunta->id))); ?>  
 

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Proximo') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>