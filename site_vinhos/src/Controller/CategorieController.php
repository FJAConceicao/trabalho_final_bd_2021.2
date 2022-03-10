<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categorie Controller
 *
 * @property \App\Model\Table\CategorieTable $Categorie
 *
 * @method \App\Model\Entity\Categorie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategorieController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $categorie = $this->paginate($this->Categorie);

        $this->set(compact('categorie'));
    }

    /**
     * View method
     *
     * @param string|null $id Categorie id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categorie = $this->Categorie->get($id, [
            'contain' => ['Product'],
        ]);

        $this->set('categorie', $categorie);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categorie = $this->Categorie->newEntity();
        if ($this->request->is('post')) {
            $categorie = $this->Categorie->patchEntity($categorie, $this->request->getData());
            if ($this->Categorie->save($categorie)) {
                $this->Flash->success(__('The categorie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categorie could not be saved. Please, try again.'));
        }
        $product = $this->Categorie->Product->find('list', ['limit' => 200]);
        $this->set(compact('categorie', 'product'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Categorie id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categorie = $this->Categorie->get($id, [
            'contain' => ['Product'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categorie = $this->Categorie->patchEntity($categorie, $this->request->getData());
            if ($this->Categorie->save($categorie)) {
                $this->Flash->success(__('The categorie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categorie could not be saved. Please, try again.'));
        }
        $product = $this->Categorie->Product->find('list', ['limit' => 200]);
        $this->set(compact('categorie', 'product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Categorie id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categorie = $this->Categorie->get($id);
        if ($this->Categorie->delete($categorie)) {
            $this->Flash->success(__('The categorie has been deleted.'));
        } else {
            $this->Flash->error(__('The categorie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
