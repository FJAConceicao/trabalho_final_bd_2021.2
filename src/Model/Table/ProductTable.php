<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Product Model
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductTable extends Table
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

        $this->setTable('product');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 256)
            ->allowEmptyString('name');

        $validator
            ->scalar('asin')
            ->maxLength('asin', 256)
            ->allowEmptyString('asin');

        $validator
            ->scalar('brand')
            ->maxLength('brand', 256)
            ->allowEmptyString('brand');

        $validator
            ->scalar('source_url')
            ->maxLength('source_url', 2048)
            ->allowEmptyString('source_url');

        $validator
            ->scalar('description')
            ->maxLength('description', 2048)
            ->allowEmptyString('description');

        $validator
            ->integer('fk_info_info_PK')
            ->allowEmptyString('fk_info_info_PK');

        $validator
            ->integer('fk_Manufacturer_Id')
            ->allowEmptyString('fk_Manufacturer_Id');

        $validator
            ->scalar('categories')
            ->maxLength('categories', 2048)
            ->requirePresence('categories', 'create')
            ->notEmptyString('categories');

        return $validator;
    }
}
