<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subdistrict Entity
 *
 * @property string $subdistrict_code
 * @property int|null $subdistrict_version
 * @property string|null $subdistrict_name
 * @property string|null $subdistrict_name_local
 * @property string|null $district_code
 * @property string|null $census2001_code
 * @property string|null $census2011_code
 */
class Subdistrict extends Entity
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
        'subdistrict_version' => true,
        'subdistrict_name' => true,
        'subdistrict_name_local' => true,
        'district_code' => true,
        'census2001_code' => true,
        'census2011_code' => true
    ];
}
