<div class="container2">
    <?= $this->Form->create($pregunta) ?>
    <fieldset>
        <legend><?= __('Crear Pregunta') ?></legend>
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
       <?= $this->Form->button('agregar selecciones', ['id'=>'sub','type'=>'button','class'=>"btn btn-primary"]); ?>
        <?= $this->Form->input('numerador', ['id'=>'numerador','type'=>'hidden']); ?>
            <br>
            <br>
            <div id="cantidad"></div>
             <div id="boton"></div>
            <div id="subcategorias"></div>  
    </fieldset>
     <center><?= $this->Form->button('Guardar',['id'=>'enviar','class'=>'btn btn-success','type'=>'submit']) ?></center>
    <?= $this->Form->end() ?><br>
</div>
<br>
<script type="text/javascript">
    $(document).on('ready',function(){
        var c=0
        var n=0
        $('#categoria-id').select2();
        $('#sub').on('click',function(){
              $('#cantidad').append( "<div class='form-group'><label for='contenido'>¿Cuantas selecciones quiere generar?</label><input type='text' name='cant' id='cant' class='form-control'></div>");
              $('#cantidad').append("<br>");
            $('#boton').append("<div class='form-group'><input type='button' value='generar selecciones' name='generar' id='genera' class='btn btn-primary'></div>");
             $('#boton').append("<br>");
              $('#genera').on('click',function(){
                   var cant=$('#cant').val();
                    for (var j =1; j<=cant; j++) {
                         c=c+1
                         $('#subcategorias').append( "<div id='mycontenido"+c+"'><div class='form-group'><label for='contenido'>Coloque la opcion</label><input type='text' name='res"+c+"' id='res"+c+"' class='form-control'></div><div class='form-group'><label for='contenido'>¿Es la opcion correcta?</label><select name='cor"+c+"' id='cor"+c+"' class='form-control'><option value=0>No</option><option value=1>Si</option></select></div>")
                         $("#mycontenido"+c+"").css(
                            { "padding": "20px",
                              "margin-bottom": "20px",
                              "background-color": "#e3f2fd",
                              "box-shadow": "10px 10px 5px -6px rgba(0,0,0,0.39)",
                              "border-radius":"10px 10px 10px 10px"
                            });
                        console.log(c) 
                    }
                       n=c
                       console.log(n)
                      $('#numerador').val(n);
                 });
        });
    });
</script>
