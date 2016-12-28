<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Categorias Controller
 *
 * @property \App\Model\Table\CategoriasTable $Categorias
 */
class CategoriasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $categorias = $this->paginate($this->Categorias);

        $this->set(compact('categorias'));
        $this->set('_serialize', ['categorias']);
    }

    /**
     * View method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoria = $this->Categorias->get($id, [
            'contain' => ['Evaluacions', 'Preguntas']
        ]);

        $this->set('categoria', $categoria);
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoria = $this->Categorias->newEntity();
        if ($this->request->is('post')) {
            $evaluacions = TableRegistry::get('Evaluacions');
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
            $n=$this->request->data['numerador'];
            $this->request->data['cantidad']=$this->request->data['numerador'];
            $nombre=array();
            $ponderada=array();
            for ($i=1; $i <=$n ; $i++) {
                array_push( $nombre, $this->request->data['eva'.$i.""]);
                array_push( $ponderada, $this->request->data['pon'.$i.""]);        
            }
            if ($this->Categorias->save($categoria)) {
                $categoria_id=$categoria->id;
                   for ($i=0; $i <$n ; $i++) { 
                       $sub=['nombre'=>$nombre[$i],'ponderada'=>$ponderada[$i],'categoria_id'=>$categoria_id];
                       $evaluacion= $evaluacions->newEntity($sub, ['validate' => false]);
                       $evaluacions->save($evaluacion);
                   }
                $this->Flash->success(__('La materia ah sido guardada.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se pudo guardar la materia. Porfavor intente de nuevo.'));
            }
        }
        $evaluacions = $this->Categorias->Evaluacions->find('list', ['limit' => 200]);
        $this->set(compact('categoria', 'evaluacions'));
        $this->set('_serialize', ['categoria']);
    }

    public function add2()
    {
        $categoria = $this->Categorias->newEntity();
        if ($this->request->is('post')) {
            $evaluacions = TableRegistry::get('Evaluacions');
            //$categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
            $n=$this->request->data['numerador'];
            $this->request->data['cantidad']=$this->request->data['numerador'];
            $categoria_id=$this->request->data['categoria_id'];
            $nombre=array();
            $ponderada=array();
            for ($i=1; $i <=$n ; $i++) {
                array_push( $nombre, $this->request->data['eva'.$i.""]);
                array_push( $ponderada, $this->request->data['pon'.$i.""]);
            }
            for ($i=0; $i <$n ; $i++) { 
                       $sub=['nombre'=>$nombre[$i],'ponderada'=>$ponderada[$i],'categoria_id'=>$categoria_id];
                       $evaluacion= $evaluacions->newEntity($sub, ['validate' => true]);
                       $evaluacions->save($evaluacion);
                   }
            if ($evaluacions->save($evaluacion)) {
                $this->Flash->success(__('La materia ah sido guardada.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se pudo guardar la materia. Porfavor intente de nuevo.'));
            }
        }
        $evaluacions = $this->Categorias->Evaluacions->find('list', ['limit' => 200]);
        $cate = $this->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('categoria', 'evaluacions','cate'));
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoria = $this->Categorias->get($id, [
            'contain' => ['Evaluacions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
            if ($this->Categorias->save($categoria)) {
               $this->Flash->success(__('La materia ah sido editada.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $$this->Flash->error(__('No se pudo editar la materia. Porfavor intente de nuevo.'));
            }
        }
        $evaluacions = $this->Categorias->Evaluacions->find('list', ['limit' => 200]);
        $this->set(compact('categoria', 'evaluacions'));
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoria = $this->Categorias->get($id);
        if ($this->Categorias->delete($categoria)) {
            $this->Flash->success(__('La materia ah sido borrada.'));
        } else {
            $this->Flash->error(__('Imposible borrar la materia. Porfavor intente de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
