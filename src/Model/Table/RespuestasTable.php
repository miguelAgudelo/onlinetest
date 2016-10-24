<?php
namespace App\Model\Table;

use App\Model\Entity\Respuesta;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Respuestas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Preguntas
 * @property \Cake\ORM\Association\BelongsTo $Tipos
 */
class RespuestasTable extends Table
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

        $this->table('respuestas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Preguntas', [
            'foreignKey' => 'pregunta_id',
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
            ->allowEmpty('texto');

        $validator
            ->allowEmpty('photo');

        $validator
            ->allowEmpty('dir');

        $validator
            ->boolean('correcta')
            ->requirePresence('correcta', 'create')
            ->notEmpty('correcta');

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
        $rules->add($rules->existsIn(['pregunta_id'], 'Preguntas'));
       
        return $rules;
    }
}
