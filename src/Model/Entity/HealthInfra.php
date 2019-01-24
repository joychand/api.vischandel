<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HealthInfra Entity
 *
 * @property int $health_infra_id
 * @property int|null $health_reference_year
 * @property int|null $no_of_doctors
 * @property int|null $no_of_anm
 * @property int|null $no_of_staff_nurse
 * @property int|null $no_of_asha
 * @property string|null $asha_mobile
 * @property string|null $village_code
 * @property string|null $name_of_health_centre
 */
class HealthInfra extends Entity
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
        'health_reference_year' => true,
        'no_of_doctors' => true,
        'no_of_anm' => true,
        'no_of_staff_nurse' => true,
        'no_of_asha' => true,
        'asha_mobile' => true,
        'village_code' => true,
        'name_of_health_centre' => true
    ];
}
