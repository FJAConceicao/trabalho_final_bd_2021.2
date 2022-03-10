<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductCategorie Controller
 *
 * @property \App\Model\Table\ProductCategorieTable $ProductCategorie
 *
 * @method \App\Model\Entity\ProductCategorie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductCategorieController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Product', 'Categorie'],
        ];
        $productCategorie = $this->paginate($this->ProductCategorie);

        $this->set(compact('productCategorie'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Categorie id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productCategorie = $this->ProductCategorie->get($id, [
            'contain' => ['Product', 'Categorie'],
        ]);

        $this->set('productCategorie', $productCategorie);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productCategorie = $this->ProductCategorie->newEntity();
        if ($this->request->is('post')) {
            $productCategorie = $this->ProductCategorie->patchEntity($productCategorie, $this->request->getData());
            if ($this->ProductCategorie->save($productCategorie)) {
                $this->Flash->success(__('The product categorie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product categorie could not be saved. Please, try again.'));
        }
        $product = $this->ProductCategorie->Product->find('list', ['limit' => 200]);
        $categorie = $this->ProductCategorie->Categorie->find('list', ['limit' => 200]);
        $this->set(compact('productCategorie', 'product', 'categorie'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Categorie id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productCategorie = $this->ProductCategorie->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productCategorie = $this->ProductCategorie->patchEntity($productCategorie, $this->request->getData());
            if ($this->ProductCategorie->save($productCategorie)) {
                $this->Flash->success(__('The product categorie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product categorie could not be saved. Please, try again.'));
        }
        $product = $this->ProductCategorie->Product->find('list', ['limit' => 200]);
        $categorie = $this->ProductCategorie->Categorie->find('list', ['limit' => 200]);
        $this->set(compact('productCategorie', 'product', 'categorie'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Categorie id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productCategorie = $this->ProductCategorie->get($id);
        if ($this->ProductCategorie->delete($productCategorie)) {
            $this->Flash->success(__('The product categorie has been deleted.'));
        } else {
            $this->Flash->error(__('The product categorie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
