<div class="container-fluid">
    <?= $this->Form->create($categoria) ?>
    <fieldset>
        <legend><?= __('Crear Categoria') ?></legend>
        <div class="form-group">
            <label for="nombre">Nombre de la categoria</label>
            <?= $this->Form->input('nombre',['label'=>'','class'=>"form-control"]); ?>
         </div>
         <div class="form-group">
            <?= $this->Form->button('agregar evaluaciones', ['id'=>'sub','type'=>'button','class'=>"btn btn-primary"]); ?>
         </div>
            <?= $this->Form->input('numerador', ['id'=>'numerador','type'=>'hidden']); ?>
            <br>
            <div id="cantidad"></div>
             <div id="boton"></div>
            <div id="subcategorias"></div><br>  
    </fieldset>
    <?= $this->Form->button('Guardar',['id'=>'enviar','class'=>'btn btn-success','type'=>'submit']) ?>
    <?= $this->Form->end() ?>
    <br>
</div>
<script type="text/javascript">
    $(document).on('ready',function(){
        var c=0
        var n=0
        
        $('#sub').on('click',function(){
              $('#cantidad').append( " <div class='form-group'><label for='cuantas'>Cantidad de Evaluaciones que desea agregar</label><input type='number' name='cant' id='cant' class='form-control'></div>" );
              $('#cantidad').append("<br>");
            $('#boton').append("<div class='form-group'><input type='button' value='generar evaluaciones' name='generar' id='genera' class='btn btn-primary'></div>");
             $('#boton').append("<br>");
              $('#genera').on('click',function(){
                   var cant=$('#cant').val();
                    for (var j =1; j<=cant; j++) {
                         c=c+1
                         $('#subcategorias').append( "<div id='mycontenido"+c+"'><div class='form-group'><label for='evaluacion'>Nombre de la evaluacion</label><input type='text' name='eva"+c+"' id='eva"+c+"' class='form-control'><label for='ponderada'>¿Es una evaluacion ponderada?</label><select  name='pon"+c+"' id='pon"+c+"' class='form-control'><option value='No'>No</option><option value='Si'>Si</option></select></div></div><br>" )
                         $("#mycontenido"+c+"").css(
                            { "padding": "20px",
                              "margin-top": "10px",
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