<?php
namespace App\Model\Table;

use App\Model\Entity\Resultado;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Resultados Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Evaluacionpreguntas
 * @property \Cake\ORM\Association\BelongsTo $Respuestas
 */
class ResultadosTable extends Table
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

        $this->table('resultados');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Evaluacionpreguntas', [
            'foreignKey' => 'evaluacionpregunta_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Respuestas', [
            'foreignKey' => 'respuesta_id',
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
            ->integer('correcta')
            ->requirePresence('correcta', 'create')
            ->notEmpty('correcta');

        $validator
            ->integer('puntos')
            ->requirePresence('puntos', 'create')
            ->notEmpty('puntos');

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
        $rules->add($rules->existsIn(['respuesta_id'], 'Respuestas'));
        return $rules;
    }
}