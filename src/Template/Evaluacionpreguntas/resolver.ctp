<div class="container-fluid" id="micuadro">
    <h3><?= $evaluacionpregunta->has('evaluacion') ? h($evaluacionpregunta->evaluacion->nombre) : ''?></h3>
    <div class="separador"></div>
    <table class="vertical-table">
        <tr>
            <th><?= __('Creada') ?></th>
            <td colspan="4"><?= h($evaluacionpregunta->created) ?></td>
        </tr>
        <tr>
            <th><h3><?= __('Evaluacion') ?></h3></th>
        </tr>
    </table>
    <div class="separador"></div>
            <?php foreach ($pregunta as $pregunt): ?>
                <br>
                <div class="col-md-12" id="mipregunta"><?= h($pregunt->texto) ?></div>
            
            
                <?php foreach ($pregunt->respuestas as $resp): ?>
                <br> 
                <div class="col-md-12" id="mirespuestas"> 
                            <form>
                                  <input type="checkbox"><?= h($resp->texto) ?>
                             </form>
                </div>

                <?php endforeach; ?>
                 
            <?php endforeach; ?>
    </table>
    <br>
     <center>
         <?= $this->Form->button('Terminar',['class'=>'btn btn-success']) ?>
     </center>
</div>
