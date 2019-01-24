<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EducationInfra Entity
 *
 * @property int $education_infra_id
 * @property int|null $education_reference_year
 * @property int|null $total_govt_school
 * @property int|null $total_adc_school
 * @property int|null $total_private_school
 * @property int|null $total_primary_school
 * @property int|null $total_primary_student
 * @property int|null $total_jhs
 * @property int|null $total_jhs_student
 * @property int|null $total_secondary_school
 * @property int|null $total_secondary_student
 * @property int|null $total_hrsec_school
 * @property int|null $total_hrsec_student
 * @property string|null $village_code
 * @property int|null $total_primary_teacher
 * @property int|null $total_jhs_teacher
 * @property int|null $total_secondary_teacher
 * @property int|null $total_hrsec_teacher
 */
class EducationInfra extends Entity
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
        'education_reference_year' => true,
        'total_govt_school' => true,
        'total_adc_school' => true,
        'total_private_school' => true,
        'total_primary_school' => true,
        'total_primary_student' => true,
        'total_jhs' => true,
        'total_jhs_student' => true,
        'total_secondary_school' => true,
        'total_secondary_student' => true,
        'total_hrsec_school' => true,
        'total_hrsec_student' => true,
        'village_code' => true,
        'total_primary_teacher' => true,
        'total_jhs_teacher' => true,
        'total_secondary_teacher' => true,
        'total_hrsec_teacher' => true
    ];
}
