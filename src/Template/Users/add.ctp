
<div class="container2">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <center><legend><?= __('Registro') ?></legend></center>
        <div class="form-group">
        <label for="nombre">Nombre</label>
           <?= $this->Form->input('nombre',['class'=>"form-control",'label'=>'']) ?>
        </div> 
        <div class="form-group">
        <label for="apellido">Apellido</label>
           <?= $this->Form->input('apellido',['class'=>"form-control",'label'=>'']) ?>
        </div>
        <div class="form-group">
        <label for="cedula">Cedula</label> 
         <?= $this->Form->input('cedula',['type'=>'number','class'=>"form-control",'label'=>'']) ?>
        </div>
        <div class="form-group">
        <label for="sexo">Genero</label> 
            <?= $this->Form->input('sexo',['options'=>['Masculino'=>'Masculino','Femenino'=>'Femenino'],'class'=>"form-control",'label'=>'']) ?>
        </div>
        <div class="form-group">
        <label for="direccion">Direccion</label>
            <?= $this->Form->textarea('direccion',['type'=>'texarea','class'=>"form-control",'label'=>'','rows' => '5', 'cols' => '5'])?>
        </div>
        <div class="form-group">
        <label for="username">Nombre de Usuario</label>
            <?= $this->Form->input('username',['class'=>"form-control",'label'=>''])?>
        </div>
        <div class="form-group">
        <label for="password">Contraseña</label>
            <?= $this->Form->input('password',['class'=>"form-control",'label'=>''])?>
        </div>
        <div class="form-group">
        <label for="password">Repita Contraseña</label>
            <?= $this->Form->input('pass2',['type'=>'password','class'=>"form-control",'label'=>''])?>
        </div>
        <center><div id="error2"></div></center>
        <div class="form-group">
        <label for="email">Correo</label>
            <?= $this->Form->input('email',['class'=>"form-control",'label'=>''])?>
        </div>
            
       
    </fieldset>
    <br>
    <center><?= $this->Form->button('Registrar',['id'=>'enviar','class'=>'btn btn-success','type'=>'submit']) ?></center>
    <?= $this->Form->end() ?>
</div>
<br><br><br>

<script>
$(document).ready(function() {
    $('#estado').select2({"width":800})
    $('#pass2').keyup(function() {

        var pass1 = $('#password').val();
        var pass2 = $('#pass2').val();

        if ( pass1 == pass2 ) {
            $('#error2').text("La contraseña coincide").css("color", "green")
            $('.enviar').attr('disabled',false)

        } else {
            $('#error2').text("Las contraseñas no coinciden").css("color", "red")
            $('.enviar').attr('disabled',true)
        }

    });

});
</script>