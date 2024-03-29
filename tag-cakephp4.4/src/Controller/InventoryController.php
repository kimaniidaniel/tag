<?php
declare(strict_types=1);

namespace App\Controller;
use cake\Mailer\Mailer;

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
                    // 'Inventory.name like'=>'%'.$q.'%',
                    'Inventory.description like'=>'%'.$q.'%',
                    'Inventory.student_name like'=>'%'.$q.'%',
                    // 'Users.last_name like'=>'%'.$q.'%',
                    // 'Users.id_number like'=>'%'.$q.'%',
                    // 'Users.address like'=>'%'.$q.'%',
                    // 'Users.email like'=>'%'.$q.'%',
                    // 'Users.role like'=>'%'.$q.'%',
                    'Storageunits.cage_name like'=>'%'.$q.'%',
                    // 'Timeslot.like'=>'%'.$q.'%',
                    // 'Storagelocations.name like'=>'%'.$q.'%',
                    // 'Storageunits.id_number like'=>'%'.$q.'%',
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
        //created a new entry form//
        $inventory = $this->Inventory->newEmptyEntity();
        //post the form//
        if ($this->request->is('post')) {
            //get the data the user enters from the form
            $inventory = $this->Inventory->patchEntity($inventory, $this->request->getData());
            //save the data in the inventory table//
            if ($this->Inventory->save($inventory)) {
                //flash the message after data has been stored//
                $this->Flash->success(__('The inventory has been saved.'));
                // debug($inventory);die;
                $Mailer = new Mailer('gmail');
                $Mailer->setFrom(['ozmaclaw1@gmail.com' => 'TagandStore1.0'])
                    //    ->emailFormat('html')
                    ->setTo('ozmaclaw1@gmail.com')
                    ->setSubject('Submitted')
                    ->setEmailFormat('html')
                    ->deliver('This email confirms that an inventory form was sucessfully submitted. Please click on the link to access it http://localhost/tag/tag-cakephp4.4/inventory/edit/'.$inventory->id);
                        //debug($inventory);
                
                //https://book.cakephp.org/4/en/controllers/request-response.html#request-body-data
                $addnewbutton = $this->request->getData('addnew');;
                //determine if the argument variable exists and if it does then
                //return to the index page
                if(isset($addnewbutton)) return $this->redirect(['action' => 'add']);        
                return $this->redirect(['action' => 'index']);
                // debug($inventory);die;
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

        //https://book.cakephp.org/4/en/views/helpers/form.html#options-for-select-checkbox-and-radio-controls
        //https://book.cakephp.org/4/en/views/helpers/form.html#using-collections-to-build-options
        $storageLocations = $this->fetchTable("StorageLocations")->find()->select(['id','name','address'])->map(function($value, $key){
            return [
                'value' => $value->id, 'text' => $value->name . ' - ' . $value->address
            ];
        });

        $this->set(compact('inventory', 'storageunits', 'users','storageLocations'));
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
            'contain' => ['Storageunits','Users']
            
        ]);

        $this->set(compact('inventory'));
    

        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventory = $this->Inventory->patchEntity($inventory, $this->request->getData());

            $storageunitdata = $this->Inventory->Storageunits->get($inventory->storageunit_id, [
                'contain' => [],
            ]);
        //   $this->set(compact());  
            $userData = $this->Inventory->Users->get($inventory->user_id, [
                'contain' => [],
            ]);
            $this->set(compact('inventory'));

            if ($this->Inventory->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));
                $Mailer = new Mailer('gmail');
                $Mailer->setFrom(['ozmaclaw1@gmail.com' => 'TagandStore1.0'])
                    //    ->emailFormat('html')
                    ->setTo('ozmaclaw1@gmail.com')
                    // ->setTo($userData->email)
                    ->setSubject('Confirmation')
                    ->setEmailFormat('html')
                    ->deliver(nl2br('This email confirms that your items has been stored. 
                    Storage details:
                    Cage ID: '.$storageunitdata->cage_name.'
                    Description: '.$inventory->description 
                    ));
                    // $checkinbutton = $this->request->getData('checkin');;
                    // if(isset($checkinbutton)) return $this->redirect(['action' => 'add']);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
        }
        $inventory = $this ->Inventory->find('list', ['limit' => 200])->all();
        
        $storageUnits = $this->fetchTable('Storageunits')->find()->map(function($value, $key){
            return [
                'value' => $value->id, 'text' => $value->cage_name
            ];   
        });
        
        $users = $this->Inventory->Users->find()->select(['id','first_name','last_name'])->map(function($value, $key){
            return [
                'value' => $value->id, 'text' => $value->first_name . ' ' . $value->last_name
            ];
            
        });
        $this->set(compact('users','storageUnits'));
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
