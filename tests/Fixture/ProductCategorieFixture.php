<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductCategorieFixture
 */
class ProductCategorieFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'product_categorie';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'product_fk' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'categorie_fk' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_product_categorie_1' => ['type' => 'index', 'columns' => ['product_fk'], 'length' => []],
            'FK_product_categorie_2' => ['type' => 'index', 'columns' => ['categorie_fk'], 'length' => []],
        ],
        '_constraints' => [
            'FK_product_categorie_1' => ['type' => 'foreign', 'columns' => ['product_fk'], 'references' => ['product', 'id'], 'update' => 'restrict', 'delete' => 'setNull', 'length' => []],
            'FK_product_categorie_2' => ['type' => 'foreign', 'columns' => ['categorie_fk'], 'references' => ['categorie', 'id'], 'update' => 'restrict', 'delete' => 'setNull', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'product_fk' => 1,
                'categorie_fk' => 1,
            ],
        ];
        parent::init();
    }
}
