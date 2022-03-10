<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductCategorieTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductCategorieTable Test Case
 */
class ProductCategorieTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductCategorieTable
     */
    public $ProductCategorie;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductCategorie',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductCategorie') ? [] : ['className' => ProductCategorieTable::class];
        $this->ProductCategorie = TableRegistry::getTableLocator()->get('ProductCategorie', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductCategorie);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
