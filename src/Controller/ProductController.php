<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;


/**
 * Product Controller
 *
 * @property \App\Model\Table\ProductTable $Product
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $product = $this->paginate($this->Product);

        $connection = ConnectionManager::get('default');
        $results = $connection->execute('SELECT product.name, AVG(review.rating)
        FROM review
        INNER JOIN product ON product.id = review.fk_Product_Id
        GROUP BY product.name
        ORDER BY AVG(review.rating) DESC
        
        ')->fetchAll('assoc');

        //debug($results);

        $this->set(compact('product'));
        $this->set('results', $results);

    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Product->get($id);
        //$product2 = $this->paginate($this->Product);
        $product2 = $this->Product->find()->where(['fk_Manufacturer_Id' => $product->fk_info_info_PK]);

        $review = TableRegistry::get('Review')->find();
        
        $review = $review->where(['fk_Product_Id' => $product->fk_info_info_PK])->all();

        // Query para buscar produtos que possuem uma média de reviews melhores do que este produto
        $connection = ConnectionManager::get('default');
        $products = $connection->execute('SELECT product.name, AVG(review.rating)
        FROM review
        INNER JOIN product ON product.id = review.fk_Product_Id
        GROUP BY product.name
        HAVING AVG(review.rating) > ALL (SELECT AVG(review.rating)
                                        FROM review
                                        WHERE review.fk_Product_Id = '. $id .')
                                        ORDER BY AVG(review.rating) DESC')->fetchAll('assoc');        

        $this->set('product', $product);
        $this->set('product2', $product2);
        $this->set('review', $review);
        $this->set('products', $products);
        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Product->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Product->patchEntity($product, $this->request->getData());
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Product->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Product->patchEntity($product, $this->request->getData());
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Product->get($id);
        if ($this->Product->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
