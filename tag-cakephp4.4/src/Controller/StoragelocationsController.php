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
        $storagelocations = $this->paginate($this->Storagelocations);

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
