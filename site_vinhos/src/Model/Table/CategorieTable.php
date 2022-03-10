<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categorie Model
 *
 * @property \App\Model\Table\ProductTable&\Cake\ORM\Association\BelongsToMany $Product
 *
 * @method \App\Model\Entity\Categorie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Categorie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Categorie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Categorie|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Categorie saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Categorie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Categorie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Categorie findOrCreate($search, callable $callback = null, $options = [])
 */
class CategorieTable extends Table
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

        $this->setTable('categorie');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Product', [
            'foreignKey' => 'categorie_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'product_categorie',
        ]);
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
            ->scalar('categorie')
            ->maxLength('categorie', 256)
            ->allowEmptyString('categorie');

        return $validator;
    }
}
