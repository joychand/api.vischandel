<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VillageDisableInfo Entity
 *
 * @property int $id
 * @property string|null $village_code
 * @property int|null $reference_year
 * @property int|null $blind
 * @property int|null $deaf
 * @property int|null $others
 */
class VillageDisableInfo extends Entity
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
        'village_code' => true,
        'reference_year' => true,
        'blind' => true,
        'deaf' => true,
        'others' => true
    ];
}
