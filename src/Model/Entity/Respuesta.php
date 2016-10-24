<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Respuesta Entity.
 *
 * @property int $id
 * @property int $pregunta_id
 * @property \App\Model\Entity\Pregunta $pregunta
 * @property string $texto
 * @property string $photo
 * @property string $dir
 * @property int $tipo_id
 * @property \App\Model\Entity\Tipo $tipo
 * @property bool $correcta
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Respuesta extends Entity
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
