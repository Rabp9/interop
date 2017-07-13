<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetalleAccesosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetalleAccesosTable Test Case
 */
class DetalleAccesosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetalleAccesosTable
     */
    public $DetalleAccesos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalle_accesos',
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
        $config = TableRegistry::exists('DetalleAccesos') ? [] : ['className' => DetalleAccesosTable::class];
        $this->DetalleAccesos = TableRegistry::get('DetalleAccesos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetalleAccesos);

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
