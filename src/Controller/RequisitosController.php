<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Requisitos Controller
 *
 * @property \App\Model\Table\RequisitosTable $Requisitos
 */
class RequisitosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Evaluacions']
        ];
        $requisitos = $this->paginate($this->Requisitos);

        $this->set(compact('requisitos'));
        $this->set('_serialize', ['requisitos']);
    }

    /**
     * View method
     *
     * @param string|null $id Requisito id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requisito = $this->Requisitos->get($id, [
            'contain' => ['Evaluacions']
        ]);

        $this->set('requisito', $requisito);
        $this->set('_serialize', ['requisito']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requisito = $this->Requisitos->newEntity();
        if ($this->request->is('post')) {
            $requisito = $this->Requisitos->patchEntity($requisito, $this->request->data);
            if ($this->Requisitos->save($requisito)) {
                $this->Flash->success(__('Su requisito ah sido guardado con exito.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El requisito no pudo se guardado. Porfavor, intente de nuevo.'));
            }
        }
        $evaluacions = $this->Requisitos->Evaluacions->find('list', ['limit' => 200]);
        $this->set(compact('requisito', 'evaluacions'));
        $this->set('_serialize', ['requisito']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requisito id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requisito = $this->Requisitos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requisito = $this->Requisitos->patchEntity($requisito, $this->request->data);
            if ($this->Requisitos->save($requisito)) {
                $this->Flash->success(__('Su requisito ah sido editado con exito.'));
                return $this->redirect(['action' => 'index']);
            } else {
                 $this->Flash->error(__('El requisito no pudo se editado. Porfavor, intente de nuevo.'));
            }
        }
        $evaluacions = $this->Requisitos->Evaluacions->find('list', ['limit' => 200]);
        $this->set(compact('requisito', 'evaluacions'));
        $this->set('_serialize', ['requisito']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requisito id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requisito = $this->Requisitos->get($id);
        if ($this->Requisitos->delete($requisito)) {
            $this->Flash->success(__('Su requisito ah sido borrado con exito.'));
        } else {
            $this->Flash->error(__('El requisito no pudo se borrado. Porfavor, intente de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
