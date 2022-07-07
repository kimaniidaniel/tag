<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Storagelocation Controller
 *
 * @property \App\Model\Table\StoragelocationTable $Storagelocation
 * @method \App\Model\Entity\Storagelocation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoragelocationController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $storagelocation = $this->paginate($this->Storagelocation);

        $this->set(compact('storagelocation'));
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
        $storagelocation = $this->Storagelocation->get($id, [
            'contain' => [],
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
        $storagelocation = $this->Storagelocation->newEmptyEntity();
        if ($this->request->is('post')) {
            $storagelocation = $this->Storagelocation->patchEntity($storagelocation, $this->request->getData());
            if ($this->Storagelocation->save($storagelocation)) {
                $this->Flash->success(__('The storagelocation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storagelocation could not be saved. Please, try again.'));
        }
        $this->set(compact('storagelocation'));
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
        $storagelocation = $this->Storagelocation->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storagelocation = $this->Storagelocation->patchEntity($storagelocation, $this->request->getData());
            if ($this->Storagelocation->save($storagelocation)) {
                $this->Flash->success(__('The storagelocation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storagelocation could not be saved. Please, try again.'));
        }
        $this->set(compact('storagelocation'));
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
        $storagelocation = $this->Storagelocation->get($id);
        if ($this->Storagelocation->delete($storagelocation)) {
            $this->Flash->success(__('The storagelocation has been deleted.'));
        } else {
            $this->Flash->error(__('The storagelocation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
