<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Persona Entity
 *
 * @property int $id
 * @property string $dni
 * @property string $nombres
 * @property string $apellido_paterno
 * @property string $apellido_materno
 *
 * @property \App\Model\Entity\Acceso[] $accesos
 * @property \App\Model\Entity\DetalleUser[] $detalle_users
 */
class Persona extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
    
    protected function _getFullName()
    {
        return $this->_properties['apellido_paterno'] . ' ' . $this->_properties['apellido_materno'] . ', ' .
            $this->_properties['nombres'];
    }
}
