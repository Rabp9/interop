<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetalleAccesos Model
 *
 * @property \App\Model\Table\AccesosTable|\Cake\ORM\Association\BelongsTo $Accesos
 * @property \App\Model\Table\CredencialesTable|\Cake\ORM\Association\BelongsTo $Credenciales
 *
 * @method \App\Model\Entity\DetalleAcceso get($primaryKey, $options = [])
 * @method \App\Model\Entity\DetalleAcceso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DetalleAcceso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetalleAcceso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DetalleAcceso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DetalleAcceso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetalleAcceso findOrCreate($search, callable $callback = null, $options = [])
 */
class DetalleAccesosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('detalle_accesos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Accesos', [
            'foreignKey' => 'acceso_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Credenciales', [
            'foreignKey' => 'credencial_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['acceso_id'], 'Accesos'));
        $rules->add($rules->existsIn(['credencial_id'], 'Credenciales'));

        return $rules;
    }
}
