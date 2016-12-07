
<div class="container-fluid">
    <center><h3><?= __('Usuarios') ?></h3></center>
    <table class="table table-striped">
        <thead>
            <tr>
               
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('apellido') ?></th>
                <th><?= $this->Paginator->sort('cedula') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
               
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                
                <td><?= h($user->nombre) ?></td>
                <td><?= h($user->apellido) ?></td>
                <td><?= $this->Number->format($user->cedula) ?></td>
               
                <td><?= h($user->username) ?></td>
               
                <td><?= h($user->email) ?></td>
                <td><?= h($user->created) ?></td>
               
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Html->link(__('Adiccionar Materias'), ['action' => 'agregarmateria', $user->id]) ?>
                    <?= $this->Html->link(__('Retirar Materias'), ['action' => 'retirarmateria', $user->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
