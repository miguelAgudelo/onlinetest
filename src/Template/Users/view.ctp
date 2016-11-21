<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Presentados'), ['controller' => 'Presentados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Presentado'), ['controller' => 'Presentados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($user->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Apellido') ?></th>
            <td><?= h($user->apellido) ?></td>
        </tr>
        <tr>
            <th><?= __('Sexo') ?></th>
            <td><?= h($user->sexo) ?></td>
        </tr>
        <tr>
            <th><?= __('Direccion') ?></th>
            <td><?= h($user->direccion) ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Cedula') ?></th>
            <td><?= $this->Number->format($user->cedula) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Role') ?></h4>
        <?= $this->Text->autoParagraph(h($user->role)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Presentados') ?></h4>
        <?php if (!empty($user->presentados)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Evaluacion Id') ?></th>
                <th><?= __('Presenta') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->presentados as $presentados): ?>
            <tr>
                <td><?= h($presentados->id) ?></td>
                <td><?= h($presentados->user_id) ?></td>
                <td><?= h($presentados->evaluacion_id) ?></td>
                <td><?= h($presentados->presenta) ?></td>
                <td><?= h($presentados->created) ?></td>
                <td><?= h($presentados->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Presentados', 'action' => 'view', $presentados->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Presentados', 'action' => 'edit', $presentados->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Presentados', 'action' => 'delete', $presentados->id], ['confirm' => __('Are you sure you want to delete # {0}?', $presentados->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
