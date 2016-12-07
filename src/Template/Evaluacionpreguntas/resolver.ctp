<div class="container2" id="micuadro">

    <h3><?= $evaluacion[0]->nombre ?></h3>
    <?= $this->Form->input('evaluacion', ['id'=>'evaluacion','type'=>'hidden','value'=>$evaluacion[0]->id]); ?>
    <div class="separador"></div>
    <table class="vertical-table">
        <tr>
            <th><?= __('Creada') ?></th>
            <td colspan="4"><?= h($evaluacion[0]->created) ?></td>
        </tr>
    </table>
    <br>
                <?php $c=0; ?>
                <?php $v=0; ?>
                <?php foreach ($pregunta as $Preguntas): ?>
                 
                    <?= $this->Form->input('pregunta'.$c.'', ['id'=>'pregunta'.$c.'','type'=>'hidden','value'=>$Preguntas[0]->id]); ?>
                    <div class="col-md-8" id="mipregunta"><?= h($Preguntas[0]->texto) ?></div>
                    <div class="col-md-4" id="mipregunta">Ponderada en: <?php echo $evaluacionpregunta[$c]->ponderacion; ?></div>
                    <br> 
                    <div class="col-md-12" id="mirespuestas"> 
                      <div class="radio" id="mycheck">  
                      <?php foreach ($Preguntas[0]['respuestas'] as $respuesta): ?>
                      
                      <div class="col-md-12" id="mirees">         
                        <label><input type="radio" value=<?php echo $respuesta->id;?> name="miradio<?php echo $c;?>" id="radio<?php echo $v;?>"><?= h($respuesta->texto) ?></label>
                      </div>
                      <?php $v++; ?>
                      <?php endforeach ?>
                     
                      </div>
                    </div>
                   
                     <?php $c++; ?>
                 <?php endforeach ?>
                 <?= $this->Form->input('numerador', ['id'=>'numerador','type'=>'hidden','value'=>$c]); ?>
                 <?= $this->Form->input('numerador2', ['id'=>'numerador2','type'=>'hidden','value'=>$v]); ?>
           
    </table>
    <br>
     <center>
         <?= $this->Form->button('Terminar',['class'=>'btn btn-success','id'=>'terminar']) ?>
     </center>
</div>
<br>           
<script type="text/javascript">
  $(document).on('ready',function(){
       
        $('#terminar').on('click',function(){
          $('#terminar').addClass("disabled");
           var preguntas=[];
           var respuestas=[];
           var numerador=$('#numerador').val();
            for (var i = 0; i < numerador; i++) {
               var pregunta=$('#pregunta'+i+'').val()
               //preguntas.push(pregunta)
               var respuesta=$('input:radio[name=miradio'+i+']:checked').val()
               //respuestas.push(respuesta)
               $.ajax({
                  data: {"pregunta" : pregunta,"respuesta" : respuesta,"evaluacion":$('#evaluacion').val()},
                  url:   'http://localhost/pruebaonline3/evaluacionpreguntas/responder',
                  type:  'post',
                  dataType:'json',
                  beforeSend: function (xhr) {
                      console.log(respuesta);console.log(pregunta)
                  },
                  success:  function (response){
                       
                                   }
            });
            }
            alert("SU respuesta seran procesadas por el sistema por favor valla a los resultados")
            setTimeout(function(){window.location.href="http://localhost/pruebaonline3/evaluacions"} , 2000);   
        });     
    });
</script>