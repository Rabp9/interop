<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccesosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccesosTable Test Case
 */
class AccesosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AccesosTable
     */
    public $Accesos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.accesos',
        'app.personas',
        'app.detalle_users',
        'app.sistemas',
        'app.credenciales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Accesos') ? [] : ['className' => AccesosTable::class];
        $this->Accesos = TableRegistry::get('Accesos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Accesos);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
