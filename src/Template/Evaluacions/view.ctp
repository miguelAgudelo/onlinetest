<div class="container-fluid">
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
            <th><?= __('Categoria ') ?></th>
            <td><?= $evaluacion->has('categoria') ? h($evaluacion->categoria->nombre) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($evaluacion->created) ?></td>
        </tr>
    </table>
        <?php if(count($presentado2)==0): ?>
         <center><?= $this->Form->button('Realizar',['id'=>'realizar','class'=>'btn btn-primary']) ?></center>  
         <?= $this->Form->input('evaluacion_id', ['value'=>$evaluacion->id,'type'=>'hidden']); ?>
        <?php else: ?>
        <center><h5>Ya usted ha presentado esta prueba</h5></center>
        <?php endif; ?>
    </div>

</div>
<script type="text/javascript">
    $(document).on('ready',function(){

        $('#realizar').on('click',function(){
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
