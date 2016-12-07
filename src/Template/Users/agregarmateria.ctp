<div class="container2">
	
    <h3>Agregar Materias para evaluar a <?= h($user->nombre) ?> <?= h($user->apellido) ?></h3>
    <table class="table table-striped">
    	
         <tr>
            <th><?= __('Cedula') ?></th>
            <td><?= $this->Number->format($user->cedula) ?></td>
        </tr>
        
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
       
    </table>
    <?= $this->Form->create() ?>
     <div class="form-group">
            <?= $this->Form->button('agregar materias', ['id'=>'sub','type'=>'button','class'=>"btn btn-primary"]); ?>
         </div>
            <?= $this->Form->input('numerador', ['id'=>'numerador','type'=>'hidden']); ?>
            <br>
            <div id="cantidad"></div>
             <div id="boton"></div>
            <div id="subcategorias"></div>
            <center><?= $this->Form->button('Agregar',['id'=>'enviar','class'=>'btn btn-success','type'=>'submit']) ?></center>
           <?= $this->Form->end() ?>
</div>
<br><br><br><br>
<script type="text/javascript">
    $(document).on('ready',function(){
        
        $('#categoria-id').select2();
         var c=0
        var n=0
        
        $('#sub').on('click',function(){
              $('#cantidad').append( " <div class='form-group'><label for='cuantas'>Cantidad de Materias que desea agregar</label><input type='number' name='cant' id='cant' class='form-control'></div>" );
              $('#cantidad').append("<br>");
            $('#boton').append("<div class='form-group'><input type='button' value='generar selectores' name='generar' id='genera' class='btn btn-primary'></div>");
             $('#boton').append("<br>");
              $('#genera').on('click',function(){
                   var cant=$('#cant').val();
                    for (var j =1; j<=cant; j++) {
                         c=c+1
                         $('#subcategorias').append( "<div id='mycontenido"+c+"'><div class='form-group'><label for='materia'>Elija la materia</label><select  name='categoria"+c+"' id='categoria"+c+"' class='form-control'><?php foreach ($categorias as $value => $categoria) {
                         	echo '<option value='.$value.'>'.$categoria.'</option>';
                         } ?></select></div></div><br>");
                         $("#materia"+c+"").select2()
                         $("#mycontenido"+c+"").css(
                            { "padding": "20px",
                              "margin-top": "10px",
                              "background-color": "#e3f2fd",
                              "box-shadow": "10px 10px 5px -6px rgba(0,0,0,0.39)",
                              "border-radius":"10px 10px 10px 10px"
                            });
                        
                    }
                       n=c
                       console.log(c)
                      $('#numerador').val(n);
                 });
        });
        
    });
</script>