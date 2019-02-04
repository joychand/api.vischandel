<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ConnectivityInfra Entity
 *
 * @property int $id
 * @property string|null $approached_road_status
 * @property float|null $distance_from_appr_road
 * @property string|null $village_code
 * @property int|null $reference_year
 */
class ConnectivityInfra extends Entity
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
        'approached_road_status' => true,
        'distance_from_appr_road' => true,
        'village_code' => true,
        'reference_year' => true
    ];
}
