<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Evaluacionpreguntas Controller
 *
 * @property \App\Model\Table\EvaluacionpreguntasTable $Evaluacionpreguntas
 */
class EvaluacionpreguntasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {   $presentadoTable = TableRegistry::get('Presentados');
        $presentado=$presentadoTable->find()->where(['user_id'=>$this->Auth->user('id'),'presenta'=>1])->first();
        $evaluacionpreguntas = $this->Evaluacionpreguntas->find()->where(['evaluacion_id'=>$presentado->evaluacion_id,'user_id'=>$this->Auth->user('id')])->contain(['Preguntas'=>['Respuestas'],'Evaluacions']);
        $this->set([
            'evaluacionpreguntas' => $evaluacionpreguntas,
            '_serialize' => ['evaluacionpreguntas']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Evaluacionpregunta id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $evaluacionpregunta = $this->Evaluacionpreguntas->get($id, [
            'contain' => ['Evaluacions', 'Preguntas']
        ]);

        $this->set('evaluacionpregunta', $evaluacionpregunta);
        $this->set('_serialize', ['evaluacionpregunta']);
    }

    public function resolver($id = null)
    {   
        $presentadoTable = TableRegistry::get('Presentados');
        $presentado=$presentadoTable->find()->where(['evaluacion_id'=>$id,'user_id'=>$this->Auth->user('id'),'presenta'=>2])->toArray();
        if(count($presentado)==0){
            $evaluacionpregunta=$this->Evaluacionpreguntas->find()->where(['evaluacion_id'=>$id,'user_id'=>$this->Auth->user('id')])->contain(['Preguntas'=>['Respuestas']])->toArray();
            $evaluacions=TableRegistry::get('Evaluacions');
            $evaluacion=$evaluacions->find()->where(['id'=>$id])->toArray();
            $pregunta=array();
            $preguntas = TableRegistry::get('Preguntas');
            for ($i=0; $i <count($evaluacionpregunta) ; $i++) { 
                $pid=$preguntas->find()->where(['id'=>$evaluacionpregunta[$i]->pregunta_id])->contain(['Respuestas','Evaluacionpreguntas'])->toArray();
                array_push($pregunta, $pid);
            }

            $this->set(compact('evaluacionpregunta','evaluacion','pregunta'));
            $this->set('_serialize', ['evaluacionpregunta']);
        }else{
            $this->Flash->error(__('Esta evaluacion ya ha sido realizada por usted'));
            return $this->redirect(['controller'=>'evaluacions','action' => 'index']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */

    public function responder(){
        $this->render(false);
        if ($this->request->is('post')) {
           
            $resultadosTable = TableRegistry::get('Resultados');
            $respuestas = TableRegistry::get('Respuestas');
            $presentados = TableRegistry::get('Presentados');
            $Preguntas = TableRegistry::get('Preguntas');
            $evaluacionpregunta1=$this->Evaluacionpreguntas->find()->where(['user_id'=>$this->Auth->user('id'),'pregunta_id'=>$this->request->data['pregunta'],'evaluacion_id'=>$this->request->data['evaluacion']])->toArray();
            $pregunta=$Preguntas->findById($this->request->data['pregunta'])->first();
            if($pregunta->tipo==1){
                $respuesta1=$respuestas->find()->where(['id'=>$this->request->data['respuesta']])->toArray();
                $correcta=$respuesta1[0]->correcta;
                $puntos=0;
                if($correcta==1){$puntos=$evaluacionpregunta1[0]->ponderacion;}
                $evaluacionpregunta = $resultadosTable->Evaluacionpreguntas->findById($evaluacionpregunta1[0]->id)->first();
                $respuesta = $resultadosTable->Respuestas->findById($this->request->data['respuesta'])->first();
                $resultado = $resultadosTable->newEntity();
                    $resultado->evaluacionpregunta = $evaluacionpregunta;
                    $resultado->respuesta = $respuesta;
                    $resultado->correcta = $correcta;
                    $resultado->puntos = $puntos;
                if($resultadosTable->save($resultado)){
                    $presentado=$presentados->query();
                    $presentado->update()
                        ->set(['presenta'=>2])
                        ->where(['evaluacion_id' => $this->request->data['evaluacion'],'user_id'=>$this->Auth->user('id'),'presenta'=>1])
                        ->execute();
                }
            }elseif ($pregunta->tipo==2) {
                for ($i=0; $i <count($this->request->data['respuesta']) ; $i++) { 
                    $respuesta1=$respuestas->find()->where(['id'=>$this->request->data['respuesta'][$i]])->toArray();
                    $correcta=$respuesta1[0]->correcta;
                    $puntos=0;
                    if($correcta==1){
                            $cuantos=$respuestas->find()->where(['pregunta_id'=>$pregunta->id,'correcta'=>1])->toArray();
                            $puntos=$evaluacionpregunta1[0]->ponderacion/count($cuantos);
                            }
                    $evaluacionpregunta = $resultadosTable->Evaluacionpreguntas->findById($evaluacionpregunta1[0]->id)->first();
                    $respuesta = $resultadosTable->Respuestas->findById($this->request->data['respuesta'][$i])->first();
                    $resultado = $resultadosTable->newEntity();
                        $resultado->evaluacionpregunta = $evaluacionpregunta;
                        $resultado->respuesta = $respuesta;
                        $resultado->correcta = $correcta;
                        $resultado->puntos = $puntos;
                    if($resultadosTable->save($resultado)){
                        $presentado=$presentados->query();
                        $presentado->update()
                            ->set(['presenta'=>2])
                            ->where(['evaluacion_id' => $this->request->data['evaluacion'],'user_id'=>$this->Auth->user('id'),'presenta'=>1])
                            ->execute();
                    }
                }
            }elseif ($pregunta->tipo==3) {
                    $texto = $this->request->data['respuesta'];
                    $corregido=0;
                    $evaluacionpregunta = $resultadosTable->Evaluacionpreguntas->findById($evaluacionpregunta1[0]->id)->first();
                    $punto=0;
                    $Revisados = TableRegistry::get('Revisados');
                    $revisado = $Revisados->newEntity();
                        $revisado->texto = $texto;
                        $revisado->corregido = $corregido;
                        $revisado->evaluacionpregunta = $evaluacionpregunta;
                        $revisado->punto = $punto;
                        $revisado->maxima = $evaluacionpregunta->ponderacion;
                    if($Revisados->save($revisado)){
                        $presentado=$presentados->query();
                        $presentado->update()
                            ->set(['presenta'=>2])
                            ->where(['evaluacion_id' => $this->request->data['evaluacion'],'user_id'=>$this->Auth->user('id'),'presenta'=>1])
                            ->execute();
                    }
                
            }
                

        }
        
    }


    public function add()
    {
        $evaluacionpregunta = $this->Evaluacionpreguntas->newEntity();
        if ($this->request->is('post')) {
            $evaluacionpregunta = $this->Evaluacionpreguntas->patchEntity($evaluacionpregunta, $this->request->data);
            if ($this->Evaluacionpreguntas->save($evaluacionpregunta)) {
                $this->Flash->success(__('The evaluacionpregunta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The evaluacionpregunta could not be saved. Please, try again.'));
            }
        }
        $evaluacions = $this->Evaluacionpreguntas->Evaluacions->find('list', ['limit' => 200]);
        $preguntas = $this->Evaluacionpreguntas->Preguntas->find('list', ['limit' => 200]);
        $this->set(compact('evaluacionpregunta', 'evaluacions', 'preguntas'));
        $this->set('_serialize', ['evaluacionpregunta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Evaluacionpregunta id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $evaluacionpregunta = $this->Evaluacionpreguntas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evaluacionpregunta = $this->Evaluacionpreguntas->patchEntity($evaluacionpregunta, $this->request->data);
            if ($this->Evaluacionpreguntas->save($evaluacionpregunta)) {
                $this->Flash->success(__('The evaluacionpregunta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The evaluacionpregunta could not be saved. Please, try again.'));
            }
        }
        $evaluacions = $this->Evaluacionpreguntas->Evaluacions->find('list', ['limit' => 200]);
        $preguntas = $this->Evaluacionpreguntas->Preguntas->find('list', ['limit' => 200]);
        $this->set(compact('evaluacionpregunta', 'evaluacions', 'preguntas'));
        $this->set('_serialize', ['evaluacionpregunta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Evaluacionpregunta id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $evaluacionpregunta = $this->Evaluacionpreguntas->get($id);
        if ($this->Evaluacionpreguntas->delete($evaluacionpregunta)) {
            $this->Flash->success(__('The evaluacionpregunta has been deleted.'));
        } else {
            $this->Flash->error(__('The evaluacionpregunta could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
