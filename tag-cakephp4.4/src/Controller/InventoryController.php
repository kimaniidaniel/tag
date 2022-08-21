<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Inventory Controller
 *
 * @property \App\Model\Table\InventoryTable $Inventory
 * @method \App\Model\Entity\Inventory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InventoryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Storageunits', 'Users'],
        ];
        
        // debug($inventory);
        
        // for Search ------- Start -------
        if(isset($this->request->getData()['query']) && !empty($this->request->getData()['query']))
        {
            $q = $this->request->getData()['query']; // get search query sent in from form
            if(!empty($q)) {
                $conditions = ['OR'=>[
                    'Inventory.name like'=>'%'.$q.'%',
                    'Inventory.description like'=>'%'.$q.'%',
                    'Users.first_name like'=>'%'.$q.'%',
                    'Users.last_name like'=>'%'.$q.'%',
                    'Users.identifier like'=>'%'.$q.'%',
                    'Users.address like'=>'%'.$q.'%',
                    'Users.email like'=>'%'.$q.'%',
                    'Users.role like'=>'%'.$q.'%',
                    'Storageunits.name like'=>'%'.$q.'%',
                    'Storageunits.identifier like'=>'%'.$q.'%',
                ]];

                $inventory = $this->paginate($this->Inventory->find('all',['conditions'=> $conditions ]));
            }

        } else {
            $inventory = $this->paginate($this->Inventory);
        }
        // for Search ------- End -------
        
        $this->set(compact('inventory'));
    }

    /**
     * View method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inventory = $this->Inventory->get($id, [
            'contain' => ['Storageunits', 'Users'],
        ]);

        $this->set(compact('inventory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inventory = $this->Inventory->newEmptyEntity();
        if ($this->request->is('post')) {
            $inventory = $this->Inventory->patchEntity($inventory, $this->request->getData());
            if ($this->Inventory->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
        }
        $storageunits = $this->Inventory->Storageunits->find('list', ['limit' => 200])->all();
        // $users = $this->Inventory->Users->find('list', ['limit' => 200])->all();
        $users = $this->Inventory->Users->find()->select(['id','first_name','last_name'])->map(function($value, $key){
            return [
                'value' => $value->id, 'text' => $value->first_name . ' ' . $value->last_name
            ];
        });

        $this->set(compact('inventory', 'storageunits', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inventory = $this->Inventory->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventory = $this->Inventory->patchEntity($inventory, $this->request->getData());
            if ($this->Inventory->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
        }
        $storageunits = $this->Inventory->Storageunits->find('list', ['limit' => 200])->all();
        $users = $this->Inventory->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('inventory', 'storageunits', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventory = $this->Inventory->get($id);
        if ($this->Inventory->delete($inventory)) {
            $this->Flash->success(__('The inventory has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
