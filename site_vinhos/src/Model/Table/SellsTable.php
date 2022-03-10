<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sells Model
 *
 * @method \App\Model\Entity\Sell get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sell newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sell[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sell|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sell saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sell patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sell[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sell findOrCreate($search, callable $callback = null, $options = [])
 */
class SellsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('sells');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('fk_Product_Id')
            ->allowEmptyString('fk_Product_Id');

        $validator
            ->integer('fk_Store_Id')
            ->allowEmptyString('fk_Store_Id');

        return $validator;
    }
}
