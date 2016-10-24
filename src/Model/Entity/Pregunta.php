<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pregunta Entity.
 *
 * @property int $id
 * @property string $texto
 * @property string $photo
 * @property string $dir
 * @property int $categoria_id
 * @property \App\Model\Entity\Categoria $categoria
 * @property int $nivel_id
 * @property \App\Model\Entity\Nivel $nivel
 * @property int $tipo_id
 * @property \App\Model\Entity\Tipo $tipo
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Evaluacionpregunta[] $evaluacionpreguntas
 * @property \App\Model\Entity\Respuesta[] $respuestas
 */
class Pregunta extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
