<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $UserID
 * @property string $FirstName
 * @property string $LastName
 * @property string $UserName
 * @property string $Password
 * @property string $Term
 * @property string $Role
 * @property string $Identifier
 * @property string $Email
 * @property string $Address
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
        'FirstName' => true,
        'LastName' => true,
        'UserName' => true,
        'Password' => true,
        'Term' => true,
        'Role' => true,
        'Identifier' => true,
        'Email' => true,
        'Address' => true,
    ];
}
