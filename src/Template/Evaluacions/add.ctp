<div class="container2">
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
        <br>
        <div class="form-group">
         <label for="contiempo">¿Tiempo para realizar la prueba?</label> 
        <?= $this->Form->input('contiempo',['type'=>'time','label'=>'','class'=>"form-control"]); ?>
        </div>
        <br>
        <div class="form-group">
        <label for="tiempo">Fecha de expiración de la prueba</label> 
        <?= $this->Form->input('expiracion',['class'=>"form-control",'label'=>'','type'=>'datetime-local']); ?>
        </div>
        
         <div class="form-group">
            <?= $this->Form->button('agregar requisitos', ['id'=>'sub','type'=>'button','class'=>"btn btn-primary"]); ?>
         </div>
            <?= $this->Form->input('numerador', ['id'=>'numerador','type'=>'hidden']); ?>
            <br>
            <div id="cantidad"></div>
             <div id="boton"></div>
            <div id="subcategorias"></div><br>  
    </fieldset>
    <center><?= $this->Form->button('Guardar',['id'=>'enviar','class'=>'btn btn-success','type'=>'submit']) ?></center>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
    $(document).on('ready',function(){
        
        $('#categoria-id').select2();
         var c=0
        var n=0
        
        $('#sub').on('click',function(){
              $('#cantidad').append( " <div class='form-group'><label for='cuantas'>Cantidad de Requisitos que desea agregar</label><input type='number' name='cant' id='cant' class='form-control'></div>" );
              $('#cantidad').append("<br>");
            $('#boton').append("<div class='form-group'><input type='button' value='generar requisitos' name='generar' id='genera' class='btn btn-primary'></div>");
             $('#boton').append("<br>");
              $('#genera').on('click',function(){
                   var cant=$('#cant').val();
                    for (var j =1; j<=cant; j++) {
                         c=c+1
                         $('#subcategorias').append( "<div id='mycontenido"+c+"'><div class='form-group'><label for='nivel'>Nivel de las preguntas</label><select  name='nivel"+c+"' id='nivel"+c+"' class='form-control'><option value=1>facil</option><option value=2>medio</option><option value=3>dificil</option></select><label for='tipo'>Tipo de pregunta</label><select  name='tipo"+c+"' id='tipo"+c+"' class='form-control'><option value=1>seleccion simple</option></select><label for='cuantas'>¿Cuantas preguntas contendra de este tipo y dificultad?</label><input type='number' name='ca"+c+"' id='ca"+c+"' class='form-control'></div></div><br>" )
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