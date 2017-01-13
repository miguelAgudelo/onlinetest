<?php
namespace App\Model\Table;

use App\Model\Entity\Revisado;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Revisados Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Evaluacionpreguntas
 */
class RevisadosTable extends Table
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

        $this->table('revisados');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Evaluacionpreguntas', [
            'foreignKey' => 'evaluacionpregunta_id',
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
            ->requirePresence('texto', 'create')
            ->notEmpty('texto');

        $validator
            ->integer('corregido')
            ->requirePresence('corregido', 'create')
            ->notEmpty('corregido');

        $validator
            ->integer('punto')
            ->requirePresence('punto', 'create')
            ->notEmpty('punto');

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
        $rules->add($rules->existsIn(['evaluacionpregunta_id'], 'Evaluacionpreguntas'));
        return $rules;
    }
}
