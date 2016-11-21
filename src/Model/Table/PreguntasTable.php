<?php
namespace App\Model\Table;

use App\Model\Entity\Pregunta;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Preguntas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categorias
 * @property \Cake\ORM\Association\BelongsTo $Nivels
 * @property \Cake\ORM\Association\BelongsTo $Tipos
 * @property \Cake\ORM\Association\HasMany $Evaluacionpreguntas
 * @property \Cake\ORM\Association\HasMany $Respuestas
 */
class PreguntasTable extends Table
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

        $this->table('preguntas');
        $this->displayField('texto');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('Evaluacionpreguntas', [
            'foreignKey' => 'pregunta_id'
        ]);
        $this->hasMany('Respuestas', [
            'foreignKey' => 'pregunta_id'
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
            ->integer('nivel')
            ->requirePresence('nivel', 'create')
            ->notEmpty('nivel');

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
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'));
        return $rules;
    }
}
