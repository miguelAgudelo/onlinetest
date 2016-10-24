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
         <center><?= $this->Form->button('Realizar',['id'=>'realizar','class'=>'btn btn-info']) ?></center>   
    </div>

</div>
<script type="text/javascript">
    $(document).on('ready',function(){
        $('#realizar').on('click',function(){
            var n=1;
            $.ajax({
                data: {"numero" : n},
                url:   '',
                type:  'post',
                dataType:'json', beforeSend: function (xhr) {
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        console.log("enviado");
                        setTimeout('window.location.replace("http://localhost/pruebaonline2/evaluacionpreguntas/resolver")',2000);  
                },
                success:  function (response){
                    console.log(response);
                    
                                 }
                 });
         });
    });
</script>
