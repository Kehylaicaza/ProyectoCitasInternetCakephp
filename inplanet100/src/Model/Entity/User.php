<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $last_name
 * @property int $role_id
 * @property string $ci
 * @property int $city_id
 * @property string $address
 * @property string $email
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Client[] $clients
 * @property \App\Model\Entity\Employee[] $employees
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
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
      protected function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }
}
