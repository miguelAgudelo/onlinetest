<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Nivels Controller
 *
 * @property \App\Model\Table\NivelsTable $Nivels
 */
class NivelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $nivels = $this->paginate($this->Nivels);

        $this->set(compact('nivels'));
        $this->set('_serialize', ['nivels']);
    }

    /**
     * View method
     *
     * @param string|null $id Nivel id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nivel = $this->Nivels->get($id, [
            'contain' => ['Preguntas']
        ]);

        $this->set('nivel', $nivel);
        $this->set('_serialize', ['nivel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nivel = $this->Nivels->newEntity();
        if ($this->request->is('post')) {
            $nivel = $this->Nivels->patchEntity($nivel, $this->request->data);
            if ($this->Nivels->save($nivel)) {
                $this->Flash->success(__('The nivel has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nivel could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('nivel'));
        $this->set('_serialize', ['nivel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Nivel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nivel = $this->Nivels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nivel = $this->Nivels->patchEntity($nivel, $this->request->data);
            if ($this->Nivels->save($nivel)) {
                $this->Flash->success(__('The nivel has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nivel could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('nivel'));
        $this->set('_serialize', ['nivel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Nivel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nivel = $this->Nivels->get($id);
        if ($this->Nivels->delete($nivel)) {
            $this->Flash->success(__('The nivel has been deleted.'));
        } else {
            $this->Flash->error(__('The nivel could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
