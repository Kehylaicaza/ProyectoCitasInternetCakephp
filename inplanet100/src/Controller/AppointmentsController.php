<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Appointments Controller
 *
 * @property \App\Model\Table\AppointmentsTable $Appointments
 *
 * @method \App\Model\Entity\Appointment[] paginate($object = null, array $settings = [])
 */
class AppointmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Schedules', 'Clients', 'Employees']
        ];
        $appointments = $this->paginate($this->Appointments);

        $this->set(compact('appointments'));
        $this->set('_serialize', ['appointments']);
    }
    
     public function indexEmployee()
    {
        $this->paginate = [
            'contain' => ['Schedules', 'Clients', 'Employees']
        ];
        $appointments = $this->paginate($this->Appointments);

        $this->set(compact('appointments'));
        $this->set('_serialize', ['appointments']);
    }

    /**
     * View method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => ['Schedules', 'Clients', 'Employees']
        ]);

        $this->set('appointment', $appointment);
        $this->set('_serialize', ['appointment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appointment = $this->Appointments->newEntity();
        if ($this->request->is('post')) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
        $schedules = $this->Appointments->Schedules->find('list', ['limit' => 200]);
        $clients = $this->Appointments->Clients->find('list', ['limit' => 200]);
        $employees = $this->Appointments->Employees->find('list', ['limit' => 200]);
        $this->set(compact('appointment', 'schedules', 'clients', 'employees'));
        $this->set('_serialize', ['appointment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
        $schedules = $this->Appointments->Schedules->find('list', ['limit' => 200]);
        $clients = $this->Appointments->Clients->find('list', ['limit' => 200]);
        $employees = $this->Appointments->Employees->find('list', ['limit' => 200]);
        $this->set(compact('appointment', 'schedules', 'clients', 'employees'));
        $this->set('_serialize', ['appointment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appointment = $this->Appointments->get($id);
        if ($this->Appointments->delete($appointment)) {
            $this->Flash->success(__('The appointment has been deleted.'));
        } else {
            $this->Flash->error(__('The appointment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
