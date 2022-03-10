<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoreTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoreTable Test Case
 */
class StoreTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StoreTable
     */
    public $Store;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Store',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Store') ? [] : ['className' => StoreTable::class];
        $this->Store = TableRegistry::getTableLocator()->get('Store', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Store);

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
