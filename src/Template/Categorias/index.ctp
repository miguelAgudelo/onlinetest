
<div class="container1">
    <center><h3><?= __('Categorias') ?></h3></center>
    <table  id="mitabla">
          <thead id="mith">
            <tr>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('creada') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody id="mitb">
            <?php foreach ($categorias as $categoria): ?>
            <tr>
               
                <td><?= h($categoria->nombre) ?></td>
                <td><?= h($categoria->modified) ?></td>
                <td class="btn-group"> 
 

                     <?= $this->Html->link(__('Ver'), ['action' => 'view',$categoria->id],['class' => 'btn btn-sm btn-info']) ?>  



                      <?= $this->Html->link(__('Editar'), ['action' => 'edit', $categoria->id],['class' => 'btn btn-sm btn-info']) ?>    



                   <?php echo $this->Form->postLink(__('<i class="fa fa-trash">Eliminar</i>'), array('action' => 'delete', $categoria->id), array('class' => 'btn btn-sm btn-success', 'escape' => false, 'button title' => 'ELIMINAR'), array('confirm' => __('Are you sure you want to delete # {0}?', $categoria->id))); ?>  


                    
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

