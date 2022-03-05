<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sells Controller
 *
 * @property \App\Model\Table\SellsTable $Sells
 *
 * @method \App\Model\Entity\Sell[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SellsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $sells = $this->paginate($this->Sells);

        $this->set(compact('sells'));
    }

    /**
     * View method
     *
     * @param string|null $id Sell id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sell = $this->Sells->get($id, [
            'contain' => [],
        ]);

        $this->set('sell', $sell);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sell = $this->Sells->newEntity();
        if ($this->request->is('post')) {
            $sell = $this->Sells->patchEntity($sell, $this->request->getData());
            if ($this->Sells->save($sell)) {
                $this->Flash->success(__('The sell has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sell could not be saved. Please, try again.'));
        }
        $this->set(compact('sell'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sell id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sell = $this->Sells->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sell = $this->Sells->patchEntity($sell, $this->request->getData());
            if ($this->Sells->save($sell)) {
                $this->Flash->success(__('The sell has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sell could not be saved. Please, try again.'));
        }
        $this->set(compact('sell'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sell id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sell = $this->Sells->get($id);
        if ($this->Sells->delete($sell)) {
            $this->Flash->success(__('The sell has been deleted.'));
        } else {
            $this->Flash->error(__('The sell could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
