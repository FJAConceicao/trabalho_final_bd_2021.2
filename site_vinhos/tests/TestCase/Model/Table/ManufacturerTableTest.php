<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManufacturerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManufacturerTable Test Case
 */
class ManufacturerTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ManufacturerTable
     */
    public $Manufacturer;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Manufacturer',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Manufacturer') ? [] : ['className' => ManufacturerTable::class];
        $this->Manufacturer = TableRegistry::getTableLocator()->get('Manufacturer', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Manufacturer);

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
