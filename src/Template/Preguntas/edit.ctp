
<div class="container2">
    <?= $this->Form->create($pregunta) ?>
    <fieldset>
        <legend><?= __('Editar Pregunta') ?></legend>
       <div class="form-group">
        <label for="texto">Contenido de la pregunta</label>
        <?= $this->Form->input('texto',['label'=>'','class'=>"form-control"]); ?>
        </div>
        <label for="categoria-id">¿Elija la categoria?</label>
        <?= $this->Form->input('categoria_id', ['options' => $categorias,'label'=>'','class'=>"form-control"]); ?>
        <div class="form-group">
        <label for="nivel">¿Elija el nivel?</label>
        <?= $this->Form->input('nivel', ['options' => [1=>'facil',2=>'medio',3=>'dificil'],'label'=>'','class'=>"form-control"]); ?>
        </div>
        <div class="form-group">
        <label for="tipo">¿Tipo de pregunta?</label>
        <?= $this->Form->input('tipo', ['options' => [1=>'seleccion simple'],'label'=>'','class'=>"form-control"]);  ?>
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