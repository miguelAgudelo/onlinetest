
<div class="container2">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <center><legend><?= __('Editar Usuario') ?></legend></center>
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
        <center><div id="error2"></div></center>
        <div class="form-group">
        <label for="email">Correo</label>
            <?= $this->Form->input('email',['class'=>"form-control",'label'=>''])?>
        </div>
        <div class="form-group">
        <label for="Role">Estudiante o Profesor</label>
            <?= $this->Form->input('role',['class'=>"form-control",'label'=>'','options'=>['user'=>'Estudiante','admin'=>'Profesor','superadmin'=>'Administrador']])?>
        </div>            
       
    </fieldset>
    <center><?= $this->Form->button('Actualizar',['id'=>'enviar','class'=>'btn btn-success','type'=>'submit']) ?></center>
    <?= $this->Form->end() ?>
</div>
<br>
