<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetalleUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetalleUsersTable Test Case
 */
class DetalleUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetalleUsersTable
     */
    public $DetalleUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalle_users',
        'app.personas',
        'app.sistemas',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetalleUsers') ? [] : ['className' => DetalleUsersTable::class];
        $this->DetalleUsers = TableRegistry::get('DetalleUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetalleUsers);

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
