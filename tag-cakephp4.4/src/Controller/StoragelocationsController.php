<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Storagelocations Controller
 *
 * @property \App\Model\Table\StoragelocationsTable $Storagelocations
 * @method \App\Model\Entity\Storagelocation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoragelocationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        
        // for Search ------- Start -------
        // https://book.cakephp.org/4/en/orm/query-builder.html
        if(isset($this->request->getData()['query']) && !empty($this->request->getData()['query']))
        {
            $q = $this->request->getData()['query']; // get search query sent in from form
            if(!empty($q)) {
                $conditions = ['OR'=>[
                    'Users.first_name like'=>'%'.$q.'%',
                    'Users.last_name like'=>'%'.$q.'%',
                    'Users.identifier like'=>'%'.$q.'%',
                    'Users.address like'=>'%'.$q.'%',
                    'Users.unit like'=>'%'.$q.'%',
                    'Users.email like'=>'%'.$q.'%',
                    'Users.role like'=>'%'.$q.'%',
                    'Storagelocations.name like'=>'%'.$q.'%',
                    'Storagelocations.address like'=>'%'.$q.'%',
                    'Storagelocations.description like'=>'%'.$q.'%',
                ]];

                $storagelocations = $this->paginate($this->Storagelocations->find('all',['conditions'=> $conditions ]));
            }
        } else {
            $storagelocations = $this->paginate($this->Storagelocations);
        }
        // for Search ------- End -------

        // debug($storagelocations);
        
        $this->set(compact('storagelocations'));
    }

    /**
     * View method
     *
     * @param string|null $id Storagelocation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storagelocation = $this->Storagelocations->get($id, [
            'contain' => ['Users', 'Storageunits'],
        ]);

        $this->set(compact('storagelocation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storagelocation = $this->Storagelocations->newEmptyEntity();
        if ($this->request->is('post')) {
            $storagelocation = $this->Storagelocations->patchEntity($storagelocation, $this->request->getData());
            if ($this->Storagelocations->save($storagelocation)) {
                $this->Flash->success(__('The storagelocation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storagelocation could not be saved. Please, try again.'));
        }
        $users = $this->Storagelocations->Users->find('list', ['limit' => 200])->all();
        $users = $this->Storagelocations->Users->find()->select(['id','first_name','last_name'])->map(function($value, $key){
            return [
                'value' => $value->id, 'text' => $value->first_name . ' ' . $value->last_name
            ];
        });
        $this->set(compact('storagelocation', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Storagelocation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storagelocation = $this->Storagelocations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storagelocation = $this->Storagelocations->patchEntity($storagelocation, $this->request->getData());
            if ($this->Storagelocations->save($storagelocation)) {
                $this->Flash->success(__('The storagelocation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storagelocation could not be saved. Please, try again.'));
        }
        $users = $this->Storagelocations->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('storagelocation', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Storagelocation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storagelocation = $this->Storagelocations->get($id);
        if ($this->Storagelocations->delete($storagelocation)) {
            $this->Flash->success(__('The storagelocation has been deleted.'));
        } else {
            $this->Flash->error(__('The storagelocation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
