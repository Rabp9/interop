<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Credenciales Model
 *
 * @property \App\Model\Table\SistemasTable|\Cake\ORM\Association\BelongsTo $Sistemas
 *
 * @method \App\Model\Entity\Credencial get($primaryKey, $options = [])
 * @method \App\Model\Entity\Credencial newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Credencial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Credencial|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Credencial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Credencial[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Credencial findOrCreate($search, callable $callback = null, $options = [])
 */
class CredencialesTable extends Table
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

        $this->setTable('credenciales');
        $this->setEntityClass('Credencial');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

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
        $rules->add($rules->existsIn(['sistema_id'], 'Sistemas'));

        return $rules;
    }
}
