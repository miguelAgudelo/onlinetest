<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Revisados Controller
 *
 * @property \App\Model\Table\RevisadosTable $Revisados
 */
class RevisadosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Resultados']
        ];
        $revisados = $this->paginate($this->Revisados);

        $this->set(compact('revisados'));
        $this->set('_serialize', ['revisados']);
    }

    /**
     * View method
     *
     * @param string|null $id Revisado id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $Evaluacionpreguntas = TableRegistry::get('Evaluacionpreguntas');
        $evaluacionpreguntas=$Evaluacionpreguntas->find()->where(['evaluacion_id'=>$id])->contain(['Revisados'=>['Evaluacionpreguntas'=>['Users','Preguntas']]]);
        
        
       $this->set([
            'evaluacionpreguntas' => $evaluacionpreguntas,
            '_serialize' => ['evaluacionpreguntas']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $revisado = $this->Revisados->newEntity();
        if ($this->request->is('post')) {
            $revisado = $this->Revisados->patchEntity($revisado, $this->request->data);
            if ($this->Revisados->save($revisado)) {
                $this->Flash->success(__('The revisado has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The revisado could not be saved. Please, try again.'));
            }
        }
        $resultados = $this->Revisados->Resultados->find('list', ['limit' => 200]);
        $this->set(compact('revisado', 'resultados'));
        $this->set('_serialize', ['revisado']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Revisado id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $revisado = $this->Revisados->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $revisado = $this->Revisados->patchEntity($revisado, $this->request->data);
            if ($this->Revisados->save($revisado)) {
                $this->Flash->success(__('The revisado has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The revisado could not be saved. Please, try again.'));
            }
        }
        $resultados = $this->Revisados->Resultados->find('list', ['limit' => 200]);
        $this->set(compact('revisado', 'resultados'));
        $this->set('_serialize', ['revisado']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Revisado id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $revisado = $this->Revisados->get($id);
        if ($this->Revisados->delete($revisado)) {
            $this->Flash->success(__('The revisado has been deleted.'));
        } else {
            $this->Flash->error(__('The revisado could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
