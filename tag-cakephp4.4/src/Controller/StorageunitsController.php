<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;

/**
 * Storageunits Controller
 *
 * @property \App\Model\Table\StorageunitsTable $Storageunits
 * @method \App\Model\Entity\Storageunit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StorageunitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Storagelocations', 'Users'],
        ];

        // for Search ------- Start -------
        // https://book.cakephp.org/4/en/orm/query-builder.html
        if(isset($this->request->getData()['query']) && !empty($this->request->getData()['query']))
        {
            $q = $this->request->getData()['query']; // get search query sent in from form
            if(!empty($q)) {
                $conditions = ['OR'=>[
                    // 'Users.first_name like'=>'%'.$q.'%',
                    // 'Users.last_name like'=>'%'.$q.'%',
                    // 'Users.identifier like'=>'%'.$q.'%',
                    // 'Users.address like'=>'%'.$q.'%',
                   // 'Users.unit like'=>'%'.$q.'%',
                    // 'Users.email like'=>'%'.$q.'%',
                    // 'Users.role like'=>'%'.$q.'%',
                    // 'Storagelocations.storagelocation_id like'=>'%'.$q.'%',
                    // 'Storagelocations.address like'=>'%'.$q.'%',
                    // 'Storagelocations.description like'=>'%'.$q.'%',
                    'Storageunits.cage_name like'=>'%'.$q.'%',
                    // 'Storageunits.identifier like'=>'%'.$q.'%',
                ]];

                $storageunits = $this->paginate($this->Storageunits->find('all',['conditions'=> $conditions ]));
            }
        } else {
            $storageunits = $this->paginate($this->Storageunits);
        }
        // for Search ------- End -------

        // debug($storageunits);
        $this->set(compact('storageunits'));
    }

    /**
     * View method
     *
     * @param string|null $id Storageunit id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storageunit = $this->Storageunits->get($id, [
            'contain' => ['Storagelocations', 'Users', 'Inventory'],
        ]);
        
        // KD20221121 - Changed to postlink and the checkout function instead
        // if ($this->request->is('post')) {
        //     $postData = $this->request->getData();
        //     if(isset($postData['checkout']) && $postData['checkout']>0){
        //         $InventoryItem = $this->fetchTable('Inventory')->find()->where(['id'=>$postData['checkout']])->first();
        //         $InventoryItem->checkout_time = FrozenTime::now();
        //         $this->fetchTable('Inventory')->save($InventoryItem);
        //         $this->set(compact('storageunit'));
        //         return $this->Flash->success(__('Item has been checked out.'));
        //     }
        //     $this->Flash->info(__('Nothing to check out.'));
        // }

        $this->set(compact('storageunit'));
    }

    public function checkout($id = null){
        if ($this->request->is('post')) {
            $InventoryItem = $this->fetchTable('Inventory')->find()->where(['id'=>$id])->first();
            $InventoryItem->checkout_time = FrozenTime::now();
            $this->fetchTable('Inventory')->save($InventoryItem);
            $this->Flash->success(__('Item has been checked out.'));
            return $this->redirect(['action' => 'view', $InventoryItem->storageunit_id]);
        }
        $this->Flash->info(__('Nothing to check out.'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storageunit = $this->Storageunits->newEmptyEntity();
        if ($this->request->is('post')) {
            $storageunit = $this->Storageunits->patchEntity($storageunit, $this->request->getData());
            if ($this->Storageunits->save($storageunit)) {
                $this->Flash->success(__('The storageunit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storageunit could not be saved. Please, try again.'));
        debug($storageunit);
        }
        $storagelocations = $this->Storageunits->Storagelocations->find('list', ['limit' => 200])->all();
        // $users = $this->Storageunits->Users->find('list', ['limit' => 200])->all();
        $users = $this->Storageunits->Users->find()->select(['id','first_name','last_name'])->map(function($value, $key){
            return [
                'value' => $value->id, 'text' => $value->first_name . ' ' . $value->last_name
            ];
        });
        $this->set(compact('storageunit', 'storagelocations', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Storageunit id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storageunit = $this->Storageunits->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storageunit = $this->Storageunits->patchEntity($storageunit, $this->request->getData());
            if ($this->Storageunits->save($storageunit)) {
                $this->Flash->success(__('The storageunit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storageunit could not be saved. Please, try again.'));
        }
        $storagelocations = $this->Storageunits->Storagelocations->find('list', ['limit' => 200])->all();
        $users = $this->Storageunits->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('storageunit', 'storagelocations', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Storageunit id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storageunit = $this->Storageunits->get($id);
        if ($this->Storageunits->delete($storageunit)) {
            $this->Flash->success(__('The storageunit has been deleted.'));
        } else {
            $this->Flash->error(__('The storageunit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
