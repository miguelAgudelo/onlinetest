<div class="container-fluid" id="micuadro">
    <h3><?= $evaluacion[0]->nombre ?></h3>
    <div class="separador"></div>
    <table class="vertical-table">
        <tr>
            <th><?= __('Creada') ?></th>
            <td colspan="4"><?= h($evaluacion[0]->created) ?></td>
        </tr>
        <tr>
            <th><h3><?= __('Evaluacion') ?></h3></th>
        </tr>
    </table>
    <div class="separador"></div>
                <?php foreach ($pregunta as $Preguntas): ?>
                    <div class="col-md-12" id="mipregunta"><?= h($Preguntas[0]->texto) ?></div>
                    <?php foreach ($Preguntas[0]['respuestas'] as $respuesta): ?>
                    <br> 
                    <div class="col-md-12" id="mirespuestas"> 
                                <form>
                                      <input type="checkbox"><?= h($respuesta->texto) ?>
                                 </form>
                    </div>
                <?php endforeach ?>
                 <?php endforeach ?>
                
           
    </table>
    <br>
     <center>
         <?= $this->Form->button('Terminar',['class'=>'btn btn-success']) ?>
     </center>
</div>
