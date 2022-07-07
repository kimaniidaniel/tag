<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Storageunit Controller
 *
 * @property \App\Model\Table\StorageunitTable $Storageunit
 * @method \App\Model\Entity\Storageunit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StorageunitController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $storageunit = $this->paginate($this->Storageunit);

        $this->set(compact('storageunit'));
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
        $storageunit = $this->Storageunit->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('storageunit'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storageunit = $this->Storageunit->newEmptyEntity();
        if ($this->request->is('post')) {
            $storageunit = $this->Storageunit->patchEntity($storageunit, $this->request->getData());
            if ($this->Storageunit->save($storageunit)) {
                $this->Flash->success(__('The storageunit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storageunit could not be saved. Please, try again.'));
        }
        $this->set(compact('storageunit'));
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
        $storageunit = $this->Storageunit->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storageunit = $this->Storageunit->patchEntity($storageunit, $this->request->getData());
            if ($this->Storageunit->save($storageunit)) {
                $this->Flash->success(__('The storageunit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storageunit could not be saved. Please, try again.'));
        }
        $this->set(compact('storageunit'));
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
        $storageunit = $this->Storageunit->get($id);
        if ($this->Storageunit->delete($storageunit)) {
            $this->Flash->success(__('The storageunit has been deleted.'));
        } else {
            $this->Flash->error(__('The storageunit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
