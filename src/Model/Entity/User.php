<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $user_creation_date
 * @property string|null $user_name
 * @property string|null $password
 * @property string|null $user_email
 * @property string|null $user_mobile
 * @property int|null $role_id
 *
 * @property \App\Model\Entity\UsersRole $users_role
 */
class User extends Entity
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
        'user_creation_date' => true,
        'user_name' => true,
        'password' => true,
        'user_email' => true,
        'user_mobile' => true,
        'role_id' => true,
        'users_role' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    // protected $_hidden = [
    //     'password'
    // ];

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
