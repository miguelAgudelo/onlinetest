<div class="container-fluid">
    <?= $this->Form->create($nivel) ?>
    <fieldset>
        <legend><?= __('Agregar Nivel') ?></legend>
        <div class="form-group">
        <label for="pregunta-id">Agregue una dificultad</label>
        <?php
            echo $this->Form->input('dificultad',['label'=>'','class'=>'form-control']);
        ?>
        </div>
    </fieldset>
    <?= $this->Form->button('Guardar',['id'=>'enviar','class'=>'btn btn-success','type'=>'submit']) ?>
    <?= $this->Form->end() ?>
</div>
