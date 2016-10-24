<div class="container-fluid">
    <?= $this->Form->create($evaluacion) ?>
    <fieldset>
        <legend><?= __('Crear Evaluacion') ?></legend>
        <div class="form-group">
        <label for="categoria-id">Elija la categoria</label>
        <?= $this->Form->input('categoria_id',['label'=>'']); ?>
        </div>
        <div class="form-group">
        <label for="nombre">Nombre de la evaluacion</label> 
        <?= $this->Form->input('nombre',['label'=>'','class'=>"form-control"]); ?>
        </div>
        <div class="form-group">
        <label for="ponderada">¿La evaluacion es ponderada?</label> 
        <?= $this->Form->input('ponderada',['options'=>['No'=>'No','Si'=>'Si'],'label'=>'','class'=>"form-control"]); ?>
        </div>
        <div class="form-group">
        <label for="cantidad">¿Cuantas preguntas tiene?</label> 
        <?= $this->Form->input('cantidad',['label'=>'','class'=>"form-control"]); ?>
        </div> 
            
    </fieldset>
    <?= $this->Form->button('Guardar',['id'=>'enviar','class'=>'btn btn-success','type'=>'submit']) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
    $(document).on('ready',function(){
        
        $('#categoria-id').select2();
        
        
    });
</script>