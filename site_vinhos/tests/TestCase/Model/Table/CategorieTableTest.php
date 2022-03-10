<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategorieTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategorieTable Test Case
 */
class CategorieTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategorieTable
     */
    public $Categorie;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Categorie',
        'app.Product',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Categorie') ? [] : ['className' => CategorieTable::class];
        $this->Categorie = TableRegistry::getTableLocator()->get('Categorie', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Categorie);

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
