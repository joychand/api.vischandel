<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Anganwadi Entity
 *
 * @property int $anganwadi_id
 * @property int|null $anganwadi_reference_year
 * @property int|null $total_anganwadi_centre
 * @property int|null $total_anganwadi_worker
 * @property int|null $total_enrolled_children
 * @property string|null $worker_mobile
 * @property string|null $village_code
 * @property string|null $anganwadi_worker_name
 * @property int|null $first_qtr_pregnant
 * @property int|null $second_qtr_pregnant
 * @property int|null $third_qtr_pregnant
 */
class Anganwadi extends Entity
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
        'anganwadi_reference_year' => true,
        'total_anganwadi_centre' => true,
        'total_anganwadi_worker' => true,
        'total_enrolled_children' => true,
        'worker_mobile' => true,
        'village_code' => true,
        'anganwadi_worker_name' => true,
        'first_qtr_pregnant' => true,
        'second_qtr_pregnant' => true,
        'third_qtr_pregnant' => true
    ];
}
