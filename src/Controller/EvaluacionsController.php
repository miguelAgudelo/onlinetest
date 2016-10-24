<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Evaluacions Controller
 *
 * @property \App\Model\Table\EvaluacionsTable $Evaluacions
 */
class EvaluacionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {   
        $this->paginate = [
            'contain' => ['Categorias']
        ];

        $evaluacions = $this->paginate($this->Evaluacions);

        $this->set(compact('evaluacions'));
        $this->set('_serialize', ['evaluacions']);
    }

    /**
     * View method
     *
     * @param string|null $id Evaluacion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $evaluacion = $this->Evaluacions->get($id, [
            'contain' => ['Categorias', 'Evaluacionpreguntas']
        ]);
        if ($this->request->is('ajax')) {
            $evaluacionpreguntas = TableRegistry::get('Evaluacionpreguntas');
            $preguntas = TableRegistry::get('Preguntas');
            $query= $this->Evaluacions->find()
                    ->select(['cantidad','categoria_id'])
                    ->where(['id' => $id])
                    ->toArray();
            $cant=$query->cantidad;
            $categoria=$query[0]->categoria_id;
            $query2= $preguntas->find()
                    ->select(['id'])
                    ->where(['categoria_id' => $categoria])
                    ->toArray();
            $pregunta_id=array();
            
            for ($i=0; $i <count($query2) ; $i++) { 
                array_push( $pregunta_id, $query2[$i]->id);
            }
            if ($this->Evaluacions->save($evaluacion)) {
                for ($i=0; $i <count($query2) ; $i++) { 
                 $sub=['evaluacion_id'=>$id,'pregunta_id'=>$pregunta_id[$i],'user_id'=>1];
                       $evaluacionpregunta= $evaluacionpreguntas->newEntity($sub, ['validate' => false]);
                       $evaluacionpreguntas->save($evaluacionpregunta);
                       $id2=$evaluacionpregunta->id;
                }
                $this->Flash->success(__('The evaluacion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The evaluacion could not be saved. Please, try again.'));
            }
           
        }
        $this->set('evaluacion', $evaluacion);
        $this->set('_serialize', ['evaluacion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $evaluacion = $this->Evaluacions->newEntity();
        if ($this->request->is('post')) {
            $evaluacion = $this->Evaluacions->patchEntity($evaluacion, $this->request->data);
            if ($this->Evaluacions->save($evaluacion)) {
                $this->Flash->success(__('The evaluacion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The evaluacion could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Evaluacions->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('evaluacion', 'categorias'));
        $this->set('_serialize', ['evaluacion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Evaluacion id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $evaluacion = $this->Evaluacions->get($id, [
            'contain' => ['Categorias']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evaluacion = $this->Evaluacions->patchEntity($evaluacion, $this->request->data);
            if ($this->Evaluacions->save($evaluacion)) {
                $this->Flash->success(__('The evaluacion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The evaluacion could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Evaluacions->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('evaluacion', 'categorias'));
        $this->set('_serialize', ['evaluacion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Evaluacion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $evaluacion = $this->Evaluacions->get($id);
        if ($this->Evaluacions->delete($evaluacion)) {
            $this->Flash->success(__('The evaluacion has been deleted.'));
        } else {
            $this->Flash->error(__('The evaluacion could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
