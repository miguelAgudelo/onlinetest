<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Revisado'), ['action' => 'edit', $revisado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Revisado'), ['action' => 'delete', $revisado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $revisado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Revisados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Revisado'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Resultados'), ['controller' => 'Resultados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Resultado'), ['controller' => 'Resultados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="revisados view large-9 medium-8 columns content">
    <h3><?= h($revisado->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Texto') ?></th>
            <td><?= h($revisado->texto) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($revisado->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Corregido') ?></th>
            <td><?= $this->Number->format($revisado->corregido) ?></td>
        </tr>
        <tr>
            <th><?= __('Evaluacionpregunta Id') ?></th>
            <td><?= $this->Number->format($revisado->evaluacionpregunta_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Puntos') ?></th>
            <td><?= $this->Number->format($revisado->puntos) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($revisado->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($revisado->modified) ?></td>
        </tr>
    </table>
</div>
