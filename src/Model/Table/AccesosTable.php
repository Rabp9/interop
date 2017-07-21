<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accesos Model
 *
 * @property \App\Model\Table\PersonasTable|\Cake\ORM\Association\BelongsTo $Personas
 * @property \App\Model\Table\SistemasTable|\Cake\ORM\Association\BelongsTo $Sistemas
 *
 * @method \App\Model\Entity\Acceso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Acceso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Acceso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Acceso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Acceso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Acceso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Acceso findOrCreate($search, callable $callback = null, $options = [])
 */
class AccesosTable extends Table
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

        $this->setTable('accesos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sistemas', [
            'foreignKey' => 'sistema_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('DetalleAccesos', [
            'foreignKey' => 'credencial_id'
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
        $rules->add($rules->existsIn(['persona_id'], 'Personas'));
        $rules->add($rules->existsIn(['sistema_id'], 'Sistemas'));

        return $rules;
    }
}
