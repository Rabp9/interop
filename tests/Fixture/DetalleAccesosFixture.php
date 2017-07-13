<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetalleAccesosFixture
 *
 */
class DetalleAccesosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'acceso_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'credencial_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_detalle_accesos_accesos1_idx' => ['type' => 'index', 'columns' => ['acceso_id'], 'length' => []],
            'fk_detalle_accesos_credenciales1_idx' => ['type' => 'index', 'columns' => ['credencial_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'acceso_id', 'credencial_id'], 'length' => []],
            'fk_detalle_accesos_accesos1' => ['type' => 'foreign', 'columns' => ['acceso_id'], 'references' => ['accesos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_detalle_accesos_credenciales1' => ['type' => 'foreign', 'columns' => ['credencial_id'], 'references' => ['credenciales', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'acceso_id' => 1,
            'credencial_id' => 1
        ],
    ];
}
