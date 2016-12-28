<script type="text/javascript">
    $(document).on('ready',function(){
        $('.alert').hide();
        $('#realizar').on('click',function(){
            $('.alert').show();
            var x =$('#idi').val();
            var n=1;
            $.ajax({
                data: {"numero" : n},
                url:   '',
                type:  'post',
                dataType:'json', beforeSend: function (xhr) {
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        function explode(){
                          var resultado="http://localhost/pruebaonline3/evaluacionpreguntas/resolver/"+$('#evaluacion-id').val();
                          window.location.href = resultado;
                        }
                         
                        setTimeout(explode, 5000);
                },
                success:  function (response){
                    console.log(response);
                    
                                 }
                 });
         });
        
        
    });
</script>
<div class="container2">
    <div class="alert alert-success">
      <strong>La peticion de la prueba esta siendo procesada</strong> pronto usted sera redirigido a la evaluacion por favor espere.
    </div>
    <h3><?= h($evaluacion->nombre) ?></h3>
    <br>
    <table class="table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($evaluacion->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Ponderada') ?></th>
            <td><?= h($evaluacion->ponderada) ?></td>
        </tr>
        <tr>
            <th><?= __('Materia ') ?></th>
            <td><?= $evaluacion->has('categoria') ? h($evaluacion->categoria->nombre) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Creada') ?></th>
            <td><?= h($evaluacion->created) ?></td>
        </tr>
    </table>
        <?php if(count($presentado2)==0): ?>
         <center><?= $this->Form->button('Realizar',['id'=>'realizar','class'=>'btn btn-primary']) ?></center>  
         <?= $this->Form->input('evaluacion_id', ['value'=>$evaluacion->id,'type'=>'hidden']); ?>
        <?php else: ?>
        <center><div class="yapresentado"><h5>Ya usted ha presentado esta prueba</h5></div></center>
        <?php endif; ?>
    </div>

</div>

