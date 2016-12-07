<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Preguntas Controller
 *
 * @property \App\Model\Table\PreguntasTable $Preguntas
 */
class PreguntasController extends AppController
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
        $preguntas = $this->paginate($this->Preguntas);

        $this->set(compact('preguntas'));
        $this->set('_serialize', ['preguntas']);
    }

    /**
     * View method
     *
     * @param string|null $id Pregunta id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pregunta = $this->Preguntas->get($id, [
            'contain' => ['Categorias','Evaluacionpreguntas', 'Respuestas']
        ]);

        $this->set('pregunta', $pregunta);
        $this->set('_serialize', ['pregunta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pregunta = $this->Preguntas->newEntity();
        if ($this->request->is('post')) {
            $pregunta = $this->Preguntas->patchEntity($pregunta, $this->request->data);
            $respuestas = TableRegistry::get('Respuestas');
            $n=$this->request->data['numerador'];
            $this->request->data['cantidad']=$this->request->data['numerador'];
            $texto=array();
            $correcta=array();
            for ($i=1; $i <=$n ; $i++) {
                array_push( $texto, $this->request->data['res'.$i.""]);
                array_push( $correcta, $this->request->data['cor'.$i.""]);
            }
            if ($this->Preguntas->save($pregunta)) {
                $pregunta_id=$pregunta->id;
                   for ($i=0; $i <$n ; $i++) { 
                       $sub=['texto'=>$texto[$i],'correcta'=>$correcta[$i],'pregunta_id'=>$pregunta_id];
                       $respuesta= $respuestas->newEntity($sub, ['validate' => false]);
                       $respuestas->save($respuesta);
                   }
                $this->Flash->success(__('The pregunta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pregunta could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Preguntas->Categorias->find('list', ['limit' => 200]);
      
        $this->set(compact('pregunta', 'categorias'));
        $this->set('_serialize', ['pregunta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pregunta id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pregunta = $this->Preguntas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pregunta = $this->Preguntas->patchEntity($pregunta, $this->request->data);
            if ($this->Preguntas->save($pregunta)) {
                $this->Flash->success(__('The pregunta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pregunta could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Preguntas->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('pregunta', 'categorias'));
        $this->set('_serialize', ['pregunta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pregunta id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pregunta = $this->Preguntas->get($id);
        if ($this->Preguntas->delete($pregunta)) {
            $this->Flash->success(__('The pregunta has been deleted.'));
        } else {
            $this->Flash->error(__('The pregunta could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
