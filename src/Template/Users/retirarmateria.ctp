<div class="container-fluid">
	<div class="users view large-9 medium-8 columns content">
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
    
     <?php $c=0; ?>
      <?php foreach ($categorias as $categoria): ?>
          <div class="col-md-6">
            <div class="checkbox">
              <label><input type="checkbox" value="<?php echo $categoria->id ?>" name="categoria<?php echo $c; ?>" id="categoria<?php echo $c; ?>"><?= $categoria->nombre  ?></label>
            </div>
          </div>
          <?php $c++; ?>
      <?php endforeach ?>
      <input type="hidden" name="numerador" value="<?php echo $c; ?>" id="numerador">     
      <center><?= $this->Form->button('Retirar',['id'=>'enviar','class'=>'btn btn-success','type'=>'submit']) ?></center>
    
</div>
<script type="text/javascript">
    $(document).on('ready',function(){
        $('#enviar').on('click',function(){
          for (var i = 0; i < $('#numerador').val(); i++) {
            if( $('#categoria'+i+'').prop('checked') ) {
                 $.ajax({
                  data: {"categoria" : $('#categoria'+i+'').val()},
                  url:   '',
                  type:  'post',
                  dataType:'json',
                  beforeSend: function (xhr) {
                     
                  },
                  success:  function (response){
                       console.log(response)
                                   }
                  });
            }
          }
        });
    });
</script>