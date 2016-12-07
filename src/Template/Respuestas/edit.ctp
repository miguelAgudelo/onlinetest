
<div class="container2">
    <?= $this->Form->create($respuesta) ?>
    <fieldset>
        <legend><?= __('Agregar Respuesta') ?></legend>
        <div class="form-group">
        <label for="pregunta-id">¿Elija la pregunta a la q pertenece?</label>
        <?=   $this->Form->input('pregunta_id', ['label'=>'','options' => $preguntas,'class'=>'form-control']);  ?>
        </div>
        <div class="form-group">
        <label for="texto">Texto de la respuesta</label>
        <?=   $this->Form->input('texto',['label'=>'','class'=>'form-control']);  ?>
         </div>
        <div class="checkbox">
        <label for="correcta">¿La pregunta es la correcta?
        <?=   $this->Form->input('correcta',['label'=>'','type'=>"checkbox", 'id'=>"checkboxSuccess" ,'value'=>true]); ?>
        </label>
        </div>
       
    </fieldset>
    <center><?= $this->Form->button('Actualizar',['id'=>'enviar','class'=>'btn btn-success','type'=>'submit']) ?></center>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
     $(document).on('ready',function(){
        $('#pregunta-id').select2();
     });
</script>
