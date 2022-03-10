<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use PDO;
use Cake\Datasource\ConnectionManager;
/**
 * Store Controller
 *
 * @property \App\Model\Table\StoreTable $Store
 *
 * @method \App\Model\Entity\Store[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoreController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $connection = ConnectionManager::get('default');
        
        $store = $this->paginate($this->Store);

        // Query para consultar as lojas que produzem e vendem ao mesmo tempo
        $urls = $connection->execute('SELECT store.url  
        FROM store
        where url <> "" and url is not null
        UNION
        SELECT manufacturer.url
        FROM manufacturer
        where url <> "" and url is not null
        UNION
        SELECT product.source_url
        FROM product
        where source_url <> "" and source_url is not null        
        ')->fetchAll('assoc');
        
        $this->set('urls', $urls);
        $this->set(compact('store'));
    }

    /**
     * View method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $connection = ConnectionManager::get('default');

        $store = $this->Store->get($id, [
            'contain' => [],
        ]);

        // Query para consultar as produtoras que mais vendem de uma loja
        $results = $connection->execute('SELECT store.name,manufacturer.name, COUNT(*)
        FROM store
        INNER JOIN sells ON store.id = sells.fk_Store_Id
        INNER JOIN product ON product.id = sells.fk_Product_Id 
        INNER JOIN manufacturer ON manufacturer.id = fk_Manufacturer_id
        where manufacturer.name <>"" and store.id ='.$id.'
        GROUP BY store.name,manufacturer.name 
        Order by COUNT(*) DESC
        ')->fetchAll('assoc');

        $this->set('store', $store);
        $this->set('results', $results);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $store = $this->Store->newEntity();
        if ($this->request->is('post')) {
            $store = $this->Store->patchEntity($store, $this->request->getData());
            if ($this->Store->save($store)) {
                $this->Flash->success(__('The store has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store could not be saved. Please, try again.'));
        }
        $this->set(compact('store'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $store = $this->Store->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $store = $this->Store->patchEntity($store, $this->request->getData());
            if ($this->Store->save($store)) {
                $this->Flash->success(__('The store has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store could not be saved. Please, try again.'));
        }
        $this->set(compact('store'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $store = $this->Store->get($id);
        if ($this->Store->delete($store)) {
            $this->Flash->success(__('The store has been deleted.'));
        } else {
            $this->Flash->error(__('The store could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
