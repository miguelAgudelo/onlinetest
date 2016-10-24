<div class="container-fluid">
    <center><h3><?= __('Tipos') ?></h3></center>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('tip') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipos as $tipo): ?>
            <tr>
                <td><?= $this->Number->format($tipo->id) ?></td>
                <td><?= h($tipo->tip) ?></td>
                <td><?= h($tipo->created) ?></td>
                <td><?= h($tipo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tipo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipo->id)]) ?>
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
