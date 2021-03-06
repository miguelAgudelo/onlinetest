<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">UNERG</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Materias <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link("Añadir Materias", ['controller'=>'categorias','action' =>'add']);?></li>
            <li><?php echo $this->Html->link("Agregar  Evaluaciones a Categoria", ['controller'=>'categorias','action' =>'add2']);?></li>
            <li><?php echo $this->Html->link("Lista de Materias", ['controller'=>'categorias']);?></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Evaluaciones<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link("Crear Evaluaciones", ['controller'=>'evaluacions','action' =>'add']);?></li>
            <li><?php echo $this->Html->link("Lista de Evaluaciones", ['controller'=>'evaluacions']);?></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Requisitos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link("Agregar Requisitos", ['controller'=>'requisitos','action' =>'add']);?></li>
            <li><?php echo $this->Html->link("Lista de Requisitos", ['controller'=>'requisitos']);?></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Preguntas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link("Crear Preguntas", ['controller'=>'preguntas','action' =>'add']);?></li>
            <li><li><?php echo $this->Html->link("Lista de Preguntas", ['controller'=>'preguntas']);?></li></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Respuestas <span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><?php echo $this->Html->link("Crear Respuestas", ['controller'=>'respuestas','action' =>'add']);?></li>
           <li><li><?php echo $this->Html->link("Lista de Respuestas", ['controller'=>'respuestas']);?></li></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios<span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><?php echo $this->Html->link("Lista de Usuarios", ['controller'=>'users']);?></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi perfil <span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><li><?php echo $this->Html->link("Salir del sistema", ['controller'=>'users','action'=>'logout']);?></li></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>