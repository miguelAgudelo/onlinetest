<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Requisito Entity.
 *
 * @property int $id
 * @property int $evaluacion_id
 * @property \App\Model\Entity\Evaluacion $evaluacion
 * @property int $nivel
 * @property int $tipo
 * @property int $cantidad
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Requisito extends Entity
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
