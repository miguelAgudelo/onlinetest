
<div class="container2">
    <?= $this->Form->create($categoria) ?>
    <fieldset>
        <legend><?= __('Editar Materia') ?></legend>
        <div class="form-group">
            <label for="nombre">Nombre de la materia</label>
            <?= $this->Form->input('nombre',['label'=>'','class'=>"form-control"]); ?>
         </div>
    </fieldset>
    <center><?= $this->Form->button('Actualizar',['type'=>'submit','class'=>'btn btn-success']) ?></center>
    <?= $this->Form->end() ?>
</div>
