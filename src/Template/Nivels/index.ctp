<div class="container-fluid">
    <center><h3><?= __('Niveles') ?></h3></center>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('dificultad') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nivels as $nivel): ?>
            <tr>
                <td><?= $this->Number->format($nivel->id) ?></td>
                <td><?= h($nivel->dificultad) ?></td>
                <td><?= h($nivel->created) ?></td>
                <td><?= h($nivel->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nivel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nivel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nivel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nivel->id)]) ?>
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
