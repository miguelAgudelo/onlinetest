
<div class="container-fluid">
    <?= $this->Form->create($tipo) ?>
    <fieldset>
        <legend><?= __('Agregar Tipo de preguntas') ?></legend>
        <div class="form-group">
        <label for="pregunta-id">Agregue una tipo de pregunta</label>
        <?php
            echo $this->Form->input('tip',['label'=>'','class'=>'form-control']);
        ?>
        </div>
    </fieldset>
    <?= $this->Form->button('Guardar',['id'=>'enviar','class'=>'btn btn-success','type'=>'submit']) ?>
    <?= $this->Form->end() ?>
</div>
