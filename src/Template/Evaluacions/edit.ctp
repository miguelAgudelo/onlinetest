
<div class="container2">
    <?= $this->Form->create($evaluacion) ?>
    <fieldset>
        <legend><?= __('Editar la Evaluacion') ?></legend>
        <div class="form-group">
        <label for="nombre">Nombre de la evaluación</label>
           <?= $this->Form->input('nombre',['class'=>"form-control",'label'=>'']) ?>
        </div>
        <div class="form-group">
        <label for="ponderada">¿Es una Ponderada?</label> 
           <?= $this->Form->input('ponderada',['class'=>"form-control",'label'=>'','options'=>['Si'=>'Si','No'=>'No']]) ?>
        </div>
        <div class="form-group">
        <label for="categoria_id">Materia a la que pertenece la evaluacion</label>  
           <?= $this->Form->input('categoria_id',['label'=>'','class'=>"form-control"]) ?>
        </div>
            
      
    </fieldset>
    <center><?= $this->Form->button('Actualizar',['id'=>'enviar','class'=>'btn btn-success','type'=>'submit']) ?></center>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
    $(document).on('ready',function(){
        $('#categoria-id').select2();
    });
</script>