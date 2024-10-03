<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string $role
 * @property string $id_number
 * @property string $email
 * @property string $address
 *
 * @property \App\Model\Entity\Inventory[] $inventory
 * @property \App\Model\Entity\Storagelocation[] $storagelocations
 * @property \App\Model\Entity\Storageunit[] $storageunits
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
     * @var array<string, bool>
     */
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        // 'username' => true,
        'password' => true,
        'role' => true,
        'id_number' => true,
        'email' => true,
        'address' => true,
        'inventory' => true,
        'storagelocations' => true,
        'storageunits' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    // Add this method
    protected function _setPassword(string $plainPassword)
    {
        $hasher = new DefaultPasswordHasher();

        return $hasher->hash($plainPassword);
    }
}
