<div class="container1">
    <center><h3><?= __('Usuarios') ?></h3></center>
    <table  id="mitabla">
        <thead id="mith">
            <tr>
               
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('apellido') ?></th>
                <th><?= $this->Paginator->sort('cedula') ?></th>
               
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody id="mitb">
            <?php foreach ($users as $user): ?>
            <tr>
                
                <td><?= h($user->nombre) ?></td>
                <td><?= h($user->apellido) ?></td>
                <td><?= $this->Number->format($user->cedula) ?></td>
               
                <td class="btn-group"> 

                   <?= $this->Html->link(__('Ver'), ['action' => 'view',$user->id],['class' => 'btn btn-sm btn-info']) ?> 


                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id],['class' => 'btn btn-sm btn-info']) ?>  


                    <?= $this->Html->link(__('Adiccionar Materias'), ['action' => 'agregarmateria', $user->id],['class' => 'btn btn-sm btn-info']) ?> 


                    <?= $this->Html->link(__('Retirar Materias'), ['action' => 'retirarmateria', $user->id],['class' => 'btn btn-sm btn-info']) ?> 

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
