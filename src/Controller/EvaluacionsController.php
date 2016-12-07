<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Evaluacions Controller
 *
 * @property \App\Model\Table\EvaluacionsTable $Evaluacions
 */
class EvaluacionsController extends AppController
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

        $evaluacions = $this->paginate($this->Evaluacions->find()->matching('Categorias.Categoriausers.Users', function ($q) {
    return $q->where(['Users.id' => $this->Auth->user('id')]);
}));

        $this->set(compact('evaluacions'));
        $this->set('_serialize', ['evaluacions']);
    }

    /**
     * View method
     *
     * @param string|null $id Evaluacion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $evaluacion = $this->Evaluacions->get($id, [
            'contain' => ['Categorias', 'Evaluacionpreguntas']
        ]);
        $presentadoTable = TableRegistry::get('Presentados');
        $presentado2=$presentadoTable->find()->where(['evaluacion_id'=>$id,'user_id'=>$this->Auth->user('id'),'presenta'=>2])->toArray();
        
       
        
        if ($this->request->is('ajax')) {
            if(count($presentado2)==0){$presentadoTable = TableRegistry::get('Presentados');
            $evaluacionpreguntas = TableRegistry::get('Evaluacionpreguntas');
            $requisitos = TableRegistry::get('Requisitos');
            $preguntas = TableRegistry::get('Preguntas');
            $uid=$this->Auth->user('id');
            $query= $this->Evaluacions->find()->where(['id' => $id])->toArray();
            $categoria=$query[0]->categoria_id;
            $query2=$requisitos->find()->where(['evaluacion_id' => $id])->toArray();
            $query3=array();
            $query4=array();
            for ($i=0; $i <count($query2) ; $i++) {

                $consulta= $preguntas->find()
                    ->where(['categoria_id' => $categoria])
                    ->andWhere(['nivel'=>$query2[$i]->nivel,'tipo'=>$query2[$i]->tipo])
                    ->toArray();
                
                    shuffle($consulta);
                    for ($j=0; $j <$query2[$i]->cantidad ; $j++) {

                        array_push($query3, $consulta[$j]->id);
                    }
                    
                    
                
            }
           $presentado1=$presentadoTable->find()->where(['evaluacion_id'=>$id,'user_id'=>$uid])->toArray();
           if(!empty($presentado1)) {
                $presenta1=$presentado1[0]->presenta;
           }else{
                 $presenta1=0;
           }
          
           if($presenta1==1) {
                $this->Flash->success(__('Exito!!'));
                return $this->redirect(['controller' => 'evaluacionpreguntas','action'=>'resolver',$id]);
           }elseif($presenta1==0){

                    $user = $presentadoTable->Users->findById($uid)->first();
                    $evaluacion = $presentadoTable->Evaluacions->findById($id)->first();
                    $presentado = $presentadoTable->newEntity();
                    $presentado->user = $user;
                    $presentado->evaluacion = $evaluacion;
                    $presentado->presenta = 1;
                    $presentadoTable->save($presentado);
                    $ponderacions=$requisitos->query()->where(['evaluacion_id'=>$id]);
                    $ponderacions->select(['sum' => $ponderacions->func()->sum('cantidad')])->toArray();
                     foreach ($ponderacions as $ponderacion) {
                        $puntos=100/$ponderacion->sum;
                     }
                    
                   for ($i=0; $i <count($query3) ; $i++) {
                       $sub=['evaluacion_id'=>$id,'pregunta_id'=>$query3[$i],'user_id'=>$uid,'ponderacion'=>$puntos];
                       $evaluacionpregunta= $evaluacionpreguntas->newEntity($sub, ['validate' => false]);
                       $evaluacionpreguntas->save($evaluacionpregunta);
                    }    
                    $this->Flash->success(__('Exito!!'));
                    return $this->redirect(['controller' => 'evaluacionpreguntas','action'=>'resolver',$id]);       
           }}
        }
       
        $this->set(compact('evaluacion','presentado2','puntos'));
        $this->set('_serialize', ['evaluacion']);
    }

    public function veresultado($id = null)
    {
       /*$evaluacion = $this->Evaluacions->get($id, [
            'contain' => ['Categorias', 'Evaluacionpreguntas'=>['Resultados'=>['Evaluacionpreguntas'=>['Preguntas']],'Users']]
        ]);
        $Resultados = TableRegistry::get('Resultados');
        $resultado=$Resultados->find()->matching('Evaluacionpreguntas.Evaluacions',function($q) use ($id)
            { 
                return $q->where(['Evaluacions.id'=>$id]);
            });
        $resultado->select([
            'total' => $resultado->func()->sum('ponderacion')
        ])->group(['user_id']);
        $t=array();
        foreach ($resultado as $total) {
            array_push($t, $total->total);
        }
        */
        $evaluacion = $this->Evaluacions->get($id);
        $Users = TableRegistry::get('Users');
        $users=$Users->find()->contain(['Evaluacionpreguntas'=>function($a) use($id){return $a->where(['evaluacion_id'=>$id])->contain(['Resultados','Preguntas']);}])->innerJoinWith('Evaluacionpreguntas.Evaluacions',function($q) use($id){
            return $q->where(['Evaluacions.id'=>$id]);
        })->toArray();
        $notas=array_unique($users);
        $this->set(compact('evaluacion','notas'));
        $this->set('_serialize', ['evaluacion']);
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $evaluacion = $this->Evaluacions->newEntity();
        if ($this->request->is('post')) {
            $requisitos = TableRegistry::get('Requisitos');
            $evaluacion = $this->Evaluacions->patchEntity($evaluacion, $this->request->data);
            $n=$this->request->data['numerador'];
            $this->request->data['cantidad']=$this->request->data['numerador'];
            $nivel=array();
            $tipo=array();
            $cantidad=array();
            for ($i=1; $i <=$n ; $i++) {
                array_push( $nivel, $this->request->data['nivel'.$i.""]);
                array_push( $tipo, $this->request->data['tipo'.$i.""]);
                array_push( $cantidad, $this->request->data['ca'.$i.""]);
            }
            $preguntas = TableRegistry::get('Preguntas');
            $numeromagico=0;
            for ($i=0; $i <$n ; $i++) {
                $consulta= $preguntas->find()
                        ->where(['categoria_id' => $this->request->data['categoria_id']])
                        ->andWhere(['nivel'=>$nivel[$i],'tipo'=>$tipo[$i]])
                        ->toArray();
                if(count($consulta)<$cantidad[$i]){
                    $numeromagico=0;
                }else{
                    $numeromagico++;
                }
            }        
            if($n==$numeromagico){
                if ($this->Evaluacions->save($evaluacion)) {
                    $evaluacion_id=$evaluacion->id;
                       for ($i=0; $i <$n ; $i++) { 
                           $sub=['nivel'=>$nivel[$i],'tipo'=>$tipo[$i],
                           'cantidad'=>$cantidad[$i],'evaluacion_id'=>$evaluacion_id];
                           $requisito= $requisitos->newEntity($sub, ['validate' => false]);
                           $requisitos->save($requisito);
                       }
                    $this->Flash->success(__('The evaluacion has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The evaluacion could not be saved. Please, try again.'));
                }
            }else{
                $this->Flash->error(__('Uno de sus requisitos no pudo ser cumplido.'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $categorias = $this->Evaluacions->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('evaluacion', 'categorias'));
        $this->set('_serialize', ['evaluacion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Evaluacion id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $evaluacion = $this->Evaluacions->get($id, [
            'contain' => ['Categorias']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evaluacion = $this->Evaluacions->patchEntity($evaluacion, $this->request->data);
            if ($this->Evaluacions->save($evaluacion)) {
                $this->Flash->success(__('The evaluacion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The evaluacion could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Evaluacions->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('evaluacion', 'categorias'));
        $this->set('_serialize', ['evaluacion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Evaluacion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $evaluacion = $this->Evaluacions->get($id);
        if ($this->Evaluacions->delete($evaluacion)) {
            $this->Flash->success(__('The evaluacion has been deleted.'));
        } else {
            $this->Flash->error(__('The evaluacion could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

     public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $role=$this->Auth->user('role');
        $this->set(compact('role'));
    }
}
