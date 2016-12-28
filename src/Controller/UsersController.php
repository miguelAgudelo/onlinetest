<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
        $role=$this->Auth->user('role');
        $this->set(compact('role'));
    }

    public function login()
    {   $role=$this->Auth->user('role');
        if(is_null($role)){ 
            if ($this->request->is('post')) {
                $user = $this->Auth->identify();
                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->Flash->error(__('¡nombre de usuario o contraseña incorrectas, intente de nuevo!'));
            }
        }else{
            return $this->redirect(['controller'=>'evaluacions','action' => 'index']);
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Presentados']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

     public function agregarmateria($id = null)
    {
        $user = $this->Users->get($id);
        $Categorias = TableRegistry::get('Categorias');
        if ($this->request->is('post')) {
            $categoriausers = TableRegistry::get('Categoriausers');
            $n=$this->request->data['numerador'];
            $this->request->data['cantidad']=$this->request->data['numerador'];
            $categoria=array();
            $cantidad=array();
            for ($i=1; $i <=$n ; $i++) {
                array_push( $categoria, $this->request->data['categoria'.$i.'']);
            }
            for ($i=0; $i <$n ; $i++) { 
                $sub=['user_id'=>$id,'categoria_id'=>$categoria[$i]];
                $categoriauser= $categoriausers->newEntity($sub, ['validate' => false]);
                $categoriausers->save($categoriauser);
                       }

                if($categoriausers->save($categoriauser)){$this->Flash->success(__('La asignacion ha sido completada'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('No se pudo guardar'));

                }
        }
        $categorias=$Categorias->find('list', ['limit' => 200]);
        $this->set(compact('user', 'categorias'));
        $this->set('_serialize', ['user']);
    }

     public function retirarmateria($id = null)
    {
        $user = $this->Users->get($id);
        $Categorias = TableRegistry::get('Categorias');
        if ($this->request->is('ajax')) {
            $categoriausers = TableRegistry::get('Categoriausers');
            $categoria=$this->request->data['categoria'];
            $categoriausers = TableRegistry::get('Categoriausers');
            $categoriauser=$categoriausers->find()->where(['user_id'=>$this->Auth->user('id'),'categoria_id'=>$categoria])->first();
            $categoriausers->delete($categoriauser);
            $this->Flash->success(__('el retiro ha sido completada'));
           
        }
        $categorias=$Categorias->find()->innerJoinWith('Categoriausers.Users',function($q) use ($id){
            return $q->where(['Users.id'=>$id]);
        });
        $this->set(compact('user', 'categorias'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['role']='user';
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Bienvenido su cuenta ah sido registrada por favor espere a que sus materias se ah cargadas.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El usuario no pudo ser registrado. Porfavor intente de nuevo'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Sus datos han sido editados.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Sus datos no pudieron ser editados. Porfavor, intente de nuevo.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El usuario ah sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar al usuario. Porfavor, intente de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
