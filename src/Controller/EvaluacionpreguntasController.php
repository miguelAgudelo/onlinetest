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
    {
        $this->paginate = [
            'contain' => ['Evaluacions', 'Preguntas']
        ];
        $evaluacionpreguntas = $this->paginate($this->Evaluacionpreguntas);

        $this->set(compact('evaluacionpreguntas'));
        $this->set('_serialize', ['evaluacionpreguntas']);
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
        $evaluacionpregunta=$this->Evaluacionpreguntas->find()->where(['evaluacion_id'=>$id,'user_id'=>1])->toArray();
        $evaluacions=TableRegistry::get('Evaluacions');
        $evaluacion=$evaluacions->find()->where(['id'=>$id])->toArray();
        $pregunta=array();
        $preguntas = TableRegistry::get('Preguntas');
        for ($i=0; $i <count($evaluacionpregunta) ; $i++) { 
            $pid=$preguntas->find()->where(['id'=>$evaluacionpregunta[$i]->pregunta_id])->contain(['Respuestas'])->toArray();
            array_push($pregunta, $pid);
        }
        
        $this->set(compact('evaluacionpregunta','evaluacion','pregunta'));
        $this->set('_serialize', ['evaluacionpregunta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
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
