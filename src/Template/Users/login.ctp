 
<div class="container3">
<?= $this->Form->create() ?>
    <fieldset>
        <center><legend><?= __('Por favor Ingrese Usuario y Contraseña') ?></legend></center>
        <div class="form-group">
        <label for="username">Nombre de usuario</label>
        <?= $this->Form->input('username',['class'=>"form-control",'label'=>'']) ?>
        </div>
        <div class="form-group">
        <label for="password">Contraseña</label>
        <?= $this->Form->input('password',['class'=>"form-control",'label'=>'']) ?>
         </div>
    </fieldset>
<center><?= $this->Form->button('Ingresar',['id'=>'enviar','class'=>'btn btn-primary ','type'=>'submit']) ?></center>
<?= $this->Form->end() ?>
<br>
<?= $this->Html->link(__('Registrarse'), ['controller' => 'users', 'action' => 'add']) ?>
</div>