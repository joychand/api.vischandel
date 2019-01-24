<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VillageNsap Entity
 *
 * @property int $village_nsap_id
 * @property int|null $total_widows_beneficiary
 * @property int|null $total_handicap_beneficiary
 * @property int|null $total_ignoaps_beneficiary
 * @property string|null $village_code
 * @property int|null $reference_year
 */
class VillageNsap extends Entity
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
        'total_widows_beneficiary' => true,
        'total_handicap_beneficiary' => true,
        'total_ignoaps_beneficiary' => true,
        'village_code' => true,
        'reference_year' => true
    ];
}
