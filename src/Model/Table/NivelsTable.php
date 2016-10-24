<?php
namespace App\Model\Table;

use App\Model\Entity\Nivel;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nivels Model
 *
 * @property \Cake\ORM\Association\HasMany $Preguntas
 */
class NivelsTable extends Table
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

        $this->table('nivels');
        $this->displayField('dificultad');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Preguntas', [
            'foreignKey' => 'nivel_id'
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
            ->requirePresence('dificultad', 'create')
            ->notEmpty('dificultad');

        return $validator;
    }
}
