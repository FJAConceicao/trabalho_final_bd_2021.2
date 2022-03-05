<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SellsFixture
 */
class SellsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fk_Product_Id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fk_Store_Id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_sells_1' => ['type' => 'index', 'columns' => ['fk_Product_Id'], 'length' => []],
            'FK_sells_2' => ['type' => 'index', 'columns' => ['fk_Store_Id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_sells_1' => ['type' => 'foreign', 'columns' => ['fk_Product_Id'], 'references' => ['product', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_sells_2' => ['type' => 'foreign', 'columns' => ['fk_Store_Id'], 'references' => ['store', 'id'], 'update' => 'restrict', 'delete' => 'setNull', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
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
                'id' => 1,
                'fk_Product_Id' => 1,
                'fk_Store_Id' => 1,
            ],
        ];
        parent::init();
    }
}
