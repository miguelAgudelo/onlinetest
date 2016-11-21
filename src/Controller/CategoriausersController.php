<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categoriausers Controller
 *
 * @property \App\Model\Table\CategoriausersTable $Categoriausers
 */
class CategoriausersController extends AppController
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
        $categoriausers = $this->paginate($this->Categoriausers);

        $this->set(compact('categoriausers'));
        $this->set('_serialize', ['categoriausers']);
    }

    /**
     * View method
     *
     * @param string|null $id Categoriauser id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoriauser = $this->Categoriausers->get($id, [
            'contain' => ['Users', 'Categorias']
        ]);

        $this->set('categoriauser', $categoriauser);
        $this->set('_serialize', ['categoriauser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoriauser = $this->Categoriausers->newEntity();
        if ($this->request->is('post')) {
            $categoriauser = $this->Categoriausers->patchEntity($categoriauser, $this->request->data);
            if ($this->Categoriausers->save($categoriauser)) {
                $this->Flash->success(__('The categoriauser has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categoriauser could not be saved. Please, try again.'));
            }
        }
        $users = $this->Categoriausers->Users->find('list', ['limit' => 200]);
        $categorias = $this->Categoriausers->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('categoriauser', 'users', 'categorias'));
        $this->set('_serialize', ['categoriauser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categoriauser id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoriauser = $this->Categoriausers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoriauser = $this->Categoriausers->patchEntity($categoriauser, $this->request->data);
            if ($this->Categoriausers->save($categoriauser)) {
                $this->Flash->success(__('The categoriauser has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categoriauser could not be saved. Please, try again.'));
            }
        }
        $users = $this->Categoriausers->Users->find('list', ['limit' => 200]);
        $categorias = $this->Categoriausers->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('categoriauser', 'users', 'categorias'));
        $this->set('_serialize', ['categoriauser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categoriauser id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoriauser = $this->Categoriausers->get($id);
        if ($this->Categoriausers->delete($categoriauser)) {
            $this->Flash->success(__('The categoriauser has been deleted.'));
        } else {
            $this->Flash->error(__('The categoriauser could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
