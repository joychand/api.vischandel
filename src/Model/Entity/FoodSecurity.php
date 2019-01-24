<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FoodSecurity Entity
 *
 * @property int $food_security_id
 * @property int|null $total_aay_members
 * @property int|null $total_phh_members
 * @property int|null $total_aadhaar_seeded_card
 * @property int|null $total_fair_price_shop
 * @property string|null $village_code
 * @property int|null $reference_year
 * @property int|null $total_aay_card
 * @property int|null $total_phh_card
 * @property string|null $fair_price_shop_name
 */
class FoodSecurity extends Entity
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
        'total_aay_members' => true,
        'total_phh_members' => true,
        'total_aadhaar_seeded_card' => true,
        'total_fair_price_shop' => true,
        'village_code' => true,
        'reference_year' => true,
        'total_aay_card' => true,
        'total_phh_card' => true,
        'fair_price_shop_name' => true
    ];
}
