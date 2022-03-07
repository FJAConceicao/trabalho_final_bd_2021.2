<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Manufacturer Controller
 *
 * @property \App\Model\Table\ManufacturerTable $Manufacturer
 *
 * @method \App\Model\Entity\Manufacturer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ManufacturerController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $manufacturer = $this->paginate($this->Manufacturer);

        // Querie para buscar a quantidade de produtos de cada produtora
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('SELECT manufacturer.name, COUNT(product.id)
        FROM product
        INNER JOIN manufacturer ON product.fk_Manufacturer_Id = manufacturer.Id
        GROUP BY manufacturer.name
        ORDER BY manufacturer.name
        ')->fetchAll('assoc');

        //debug($results);
        $this->set(compact('manufacturer'));
        $this->set('results', $results);

    }

    /**
     * View method
     *
     * @param string|null $id Manufacturer id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $manufacturer = $this->Manufacturer->get($id, [
            'contain' => [],
        ]);

        // Busca por todos os produtos relacionados ao fabricante com o id passado para a função
        $connection = ConnectionManager::get('default');
        $prodsFabricante = $connection->execute('SELECT manufacturer.name as manufacturer, product.name as product
        FROM product INNER JOIN manufacturer
        ON product.fk_Manufacturer_Id = manufacturer.id
        where manufacturer.id = '. $id .'
        ')->fetchAll('assoc');

        $this->set('manufacturer', $manufacturer);
        $this->set('prodsFabricante', $prodsFabricante);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $manufacturer = $this->Manufacturer->newEntity();
        if ($this->request->is('post')) {
            $manufacturer = $this->Manufacturer->patchEntity($manufacturer, $this->request->getData());
            if ($this->Manufacturer->save($manufacturer)) {
                $this->Flash->success(__('The manufacturer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manufacturer could not be saved. Please, try again.'));
        }
        $this->set(compact('manufacturer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Manufacturer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $manufacturer = $this->Manufacturer->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $manufacturer = $this->Manufacturer->patchEntity($manufacturer, $this->request->getData());
            if ($this->Manufacturer->save($manufacturer)) {
                $this->Flash->success(__('The manufacturer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manufacturer could not be saved. Please, try again.'));
        }
        $this->set(compact('manufacturer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Manufacturer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $manufacturer = $this->Manufacturer->get($id);
        if ($this->Manufacturer->delete($manufacturer)) {
            $this->Flash->success(__('The manufacturer has been deleted.'));
        } else {
            $this->Flash->error(__('The manufacturer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
