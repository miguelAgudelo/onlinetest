<?php
namespace App\Model\Table;

use App\Model\Entity\Evaluacionpregunta;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Evaluacionpreguntas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Evaluacions
 * @property \Cake\ORM\Association\BelongsTo $Preguntas
 */
class EvaluacionpreguntasTable extends Table
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

        $this->table('evaluacionpreguntas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Evaluacions', [
            'foreignKey' => 'evaluacion_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Preguntas', [
            'foreignKey' => 'pregunta_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('Resultados', [
            'foreignKey' => 'evaluacionpregunta_id'
        ]);

        $this->hasMany('Revisados', [
            'foreignKey' => 'evaluacionpregunta_id'
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
        $rules->add($rules->existsIn(['evaluacion_id'], 'Evaluacions'));
        $rules->add($rules->existsIn(['pregunta_id'], 'Preguntas'));
        return $rules;
    }
}
