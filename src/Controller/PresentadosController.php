<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Presentados Controller
 *
 * @property \App\Model\Table\PresentadosTable $Presentados
 */
class PresentadosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Evaluacions']
        ];
        $presentados = $this->paginate($this->Presentados);

        $this->set(compact('presentados'));
        $this->set('_serialize', ['presentados']);
    }

    /**
     * View method
     *
     * @param string|null $id Presentado id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $presentado = $this->Presentados->get($id, [
            'contain' => ['Users', 'Evaluacions']
        ]);

        $this->set('presentado', $presentado);
        $this->set('_serialize', ['presentado']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $presentado = $this->Presentados->newEntity();
        if ($this->request->is('post')) {
            $presentado = $this->Presentados->patchEntity($presentado, $this->request->data);
            if ($this->Presentados->save($presentado)) {
                $this->Flash->success(__('The presentado has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The presentado could not be saved. Please, try again.'));
            }
        }
        $users = $this->Presentados->Users->find('list', ['limit' => 200]);
        $evaluacions = $this->Presentados->Evaluacions->find('list', ['limit' => 200]);
        $this->set(compact('presentado', 'users', 'evaluacions'));
        $this->set('_serialize', ['presentado']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Presentado id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $presentado = $this->Presentados->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $presentado = $this->Presentados->patchEntity($presentado, $this->request->data);
            if ($this->Presentados->save($presentado)) {
                $this->Flash->success(__('The presentado has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The presentado could not be saved. Please, try again.'));
            }
        }
        $users = $this->Presentados->Users->find('list', ['limit' => 200]);
        $evaluacions = $this->Presentados->Evaluacions->find('list', ['limit' => 200]);
        $this->set(compact('presentado', 'users', 'evaluacions'));
        $this->set('_serialize', ['presentado']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Presentado id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $presentado = $this->Presentados->get($id);
        if ($this->Presentados->delete($presentado)) {
            $this->Flash->success(__('The presentado has been deleted.'));
        } else {
            $this->Flash->error(__('The presentado could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
