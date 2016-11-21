<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bibliotecas Controller
 *
 * @property \App\Model\Table\BibliotecasTable $Bibliotecas
 */
class BibliotecasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Categorias']
        ];
        $bibliotecas = $this->paginate($this->Bibliotecas);

        $this->set(compact('bibliotecas'));
        $this->set('_serialize', ['bibliotecas']);
    }

    /**
     * View method
     *
     * @param string|null $id Biblioteca id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $biblioteca = $this->Bibliotecas->get($id, [
            'contain' => ['Users', 'Categorias']
        ]);

        $this->set('biblioteca', $biblioteca);
        $this->set('_serialize', ['biblioteca']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $biblioteca = $this->Bibliotecas->newEntity();
        if ($this->request->is('post')) {
            $biblioteca = $this->Bibliotecas->patchEntity($biblioteca, $this->request->data);
            if ($this->Bibliotecas->save($biblioteca)) {
                $this->Flash->success(__('The biblioteca has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The biblioteca could not be saved. Please, try again.'));
            }
        }
        $users = $this->Bibliotecas->Users->find('list', ['limit' => 200]);
        $categorias = $this->Bibliotecas->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('biblioteca', 'users', 'categorias'));
        $this->set('_serialize', ['biblioteca']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Biblioteca id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $biblioteca = $this->Bibliotecas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $biblioteca = $this->Bibliotecas->patchEntity($biblioteca, $this->request->data);
            if ($this->Bibliotecas->save($biblioteca)) {
                $this->Flash->success(__('The biblioteca has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The biblioteca could not be saved. Please, try again.'));
            }
        }
        $users = $this->Bibliotecas->Users->find('list', ['limit' => 200]);
        $categorias = $this->Bibliotecas->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('biblioteca', 'users', 'categorias'));
        $this->set('_serialize', ['biblioteca']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Biblioteca id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $biblioteca = $this->Bibliotecas->get($id);
        if ($this->Bibliotecas->delete($biblioteca)) {
            $this->Flash->success(__('The biblioteca has been deleted.'));
        } else {
            $this->Flash->error(__('The biblioteca could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
