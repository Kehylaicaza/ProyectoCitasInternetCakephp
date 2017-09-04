<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Cities']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Cities', 'Clients', 'Employees']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

     public function viewUser($id = null)
    {
         
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Cities', 'Clients', 'Employees']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'cities'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'cities'));
        $this->set('_serialize', ['user']);
    }
    
    
      public function addRegistry()
    {
       $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list',['conditions' => ['role' => 'cliente']]);
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'cities'));
        $this->set('_serialize', ['user']);    
       
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
      public function logout(){
         $this->Flash->success('You are logged out');
         return $this->redirect($this->Auth->logout());
    }
    
       public function login(){
             $this->viewBuilder()->setLayout('inPlanetLo');
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                    if($user['role_id']===1){
                    return $this->redirect(['controller' => 'pages', 'action' => 'admin' ]);
                    }
                  if($user['role_id']===2){
                    return $this->redirect(['controller' => 'pages', 'action' => 'employee' ]);
                    }
                    if($user['role_id']===3){
                    return $this->redirect(['controller' => 'pages', 'action' => 'client' ]);
                    }
                
                  if($user['role_id']===4){
                    return $this->redirect(['controller' => 'pages', 'action' => 'empleadoCliente' ]);
                    }
                  
                  
                //return $this->redirect(['controller' => 'options']);
            }
            // Bad Login
            $this->Flash->error('Incorrect Login');
        }
    }
    
          public function editClient($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
return $this->redirect(['controller' => 'pages', 'action' => 'client' ]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $this->set(compact('user', 'cities'));
        $this->set('_serialize', ['user']);
    }

           public function editEmployee($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
return $this->redirect(['controller' => 'pages', 'action' => 'employee' ]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $this->set(compact('user', 'cities'));
        $this->set('_serialize', ['user']);
    }
    
}
