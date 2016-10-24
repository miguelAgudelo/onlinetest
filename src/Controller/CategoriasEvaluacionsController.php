<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CategoriasEvaluacions Controller
 *
 * @property \App\Model\Table\CategoriasEvaluacionsTable $CategoriasEvaluacions
 */
class CategoriasEvaluacionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categorias', 'Evaluacions']
        ];
        $categoriasEvaluacions = $this->paginate($this->CategoriasEvaluacions);

        $this->set(compact('categoriasEvaluacions'));
        $this->set('_serialize', ['categoriasEvaluacions']);
    }

    /**
     * View method
     *
     * @param string|null $id Categorias Evaluacion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoriasEvaluacion = $this->CategoriasEvaluacions->get($id, [
            'contain' => ['Categorias', 'Evaluacions']
        ]);

        $this->set('categoriasEvaluacion', $categoriasEvaluacion);
        $this->set('_serialize', ['categoriasEvaluacion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoriasEvaluacion = $this->CategoriasEvaluacions->newEntity();
        if ($this->request->is('post')) {
            $categoriasEvaluacion = $this->CategoriasEvaluacions->patchEntity($categoriasEvaluacion, $this->request->data);
            if ($this->CategoriasEvaluacions->save($categoriasEvaluacion)) {
                $this->Flash->success(__('The categorias evaluacion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categorias evaluacion could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->CategoriasEvaluacions->Categorias->find('list', ['limit' => 200]);
        $evaluacions = $this->CategoriasEvaluacions->Evaluacions->find('list', ['limit' => 200]);
        $this->set(compact('categoriasEvaluacion', 'categorias', 'evaluacions'));
        $this->set('_serialize', ['categoriasEvaluacion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categorias Evaluacion id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoriasEvaluacion = $this->CategoriasEvaluacions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoriasEvaluacion = $this->CategoriasEvaluacions->patchEntity($categoriasEvaluacion, $this->request->data);
            if ($this->CategoriasEvaluacions->save($categoriasEvaluacion)) {
                $this->Flash->success(__('The categorias evaluacion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categorias evaluacion could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->CategoriasEvaluacions->Categorias->find('list', ['limit' => 200]);
        $evaluacions = $this->CategoriasEvaluacions->Evaluacions->find('list', ['limit' => 200]);
        $this->set(compact('categoriasEvaluacion', 'categorias', 'evaluacions'));
        $this->set('_serialize', ['categoriasEvaluacion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categorias Evaluacion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoriasEvaluacion = $this->CategoriasEvaluacions->get($id);
        if ($this->CategoriasEvaluacions->delete($categoriasEvaluacion)) {
            $this->Flash->success(__('The categorias evaluacion has been deleted.'));
        } else {
            $this->Flash->error(__('The categorias evaluacion could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
