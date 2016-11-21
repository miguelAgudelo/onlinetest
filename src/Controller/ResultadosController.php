<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Resultados Controller
 *
 * @property \App\Model\Table\ResultadosTable $Resultados
 */
class ResultadosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Evaluacionpreguntas', 'Respuestas']
        ];
        $resultados = $this->paginate($this->Resultados);

        $this->set(compact('resultados'));
        $this->set('_serialize', ['resultados']);
    }

    /**
     * View method
     *
     * @param string|null $id Resultado id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resultado = $this->Resultados->get($id, [
            'contain' => ['Evaluacionpreguntas', 'Respuestas']
        ]);

        $this->set('resultado', $resultado);
        $this->set('_serialize', ['resultado']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resultado = $this->Resultados->newEntity();
        if ($this->request->is('post')) {
            $resultado = $this->Resultados->patchEntity($resultado, $this->request->data);
            if ($this->Resultados->save($resultado)) {
                $this->Flash->success(__('The resultado has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The resultado could not be saved. Please, try again.'));
            }
        }
        $evaluacionpreguntas = $this->Resultados->Evaluacionpreguntas->find('list', ['limit' => 200]);
        $respuestas = $this->Resultados->Respuestas->find('list', ['limit' => 200]);
        $this->set(compact('resultado', 'evaluacionpreguntas', 'respuestas'));
        $this->set('_serialize', ['resultado']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Resultado id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resultado = $this->Resultados->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resultado = $this->Resultados->patchEntity($resultado, $this->request->data);
            if ($this->Resultados->save($resultado)) {
                $this->Flash->success(__('The resultado has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The resultado could not be saved. Please, try again.'));
            }
        }
        $evaluacionpreguntas = $this->Resultados->Evaluacionpreguntas->find('list', ['limit' => 200]);
        $respuestas = $this->Resultados->Respuestas->find('list', ['limit' => 200]);
        $this->set(compact('resultado', 'evaluacionpreguntas', 'respuestas'));
        $this->set('_serialize', ['resultado']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Resultado id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resultado = $this->Resultados->get($id);
        if ($this->Resultados->delete($resultado)) {
            $this->Flash->success(__('The resultado has been deleted.'));
        } else {
            $this->Flash->error(__('The resultado could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
