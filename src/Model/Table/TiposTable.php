<?php
namespace App\Model\Table;

use App\Model\Entity\Tipo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tipos Model
 *
 * @property \Cake\ORM\Association\HasMany $Preguntas
 * @property \Cake\ORM\Association\HasMany $Respuestas
 */
class TiposTable extends Table
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

        $this->table('tipos');
        $this->displayField('tip');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Preguntas', [
            'foreignKey' => 'tipo_id'
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
            ->requirePresence('tip', 'create')
            ->notEmpty('tip');

        return $validator;
    }
}
