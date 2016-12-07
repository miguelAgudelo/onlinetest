<div class="container2">
    <?= $this->Form->create($requisito) ?>
    <fieldset>
        <legend><?= __('Agregar Requisito a una evaluación') ?></legend>
        <div class="form-group">        
            <?= $this->Form->input('evaluacion_id', ['options' => $evaluacions,'label'=>'¿A que evaluacion pertenece?','class'=>"form-control" ]); ?>
        </div>
        <div class="form-group"> 
            <?= $this->Form->input('nivel',['options' => [1=>'facil',2=>'medio',3=>'dificil'],'label'=>'Nivel de dificultad','class'=>"form-control"]); ?>
        </div>
        <div class="form-group"> 
            <?= $this->Form->input('tipo',['options' => [1=>'seleccion simple'],'label'=>'Tipo de pregunta','class'=>"form-control"]); ?>
        </div>
        <div class="form-group"> 
            <?= $this->Form->input('cantidad',['label'=>'Cantidad','class'=>"form-control" ]); ?>
        </div>
    </fieldset>
    <center><?= $this->Form->button('Agregar',['id'=>'enviar','class'=>'btn btn-success','type'=>'submit']) ?></center>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
     $(document).on('ready',function(){
       
        $('#evaluacion-id').select2();
        
    });
</script>
