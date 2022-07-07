<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Storagelocation Entity
 *
 * @property int $StorageLocationID
 * @property int $Assigned_User_ID
 * @property string $Name
 * @property string $Address
 * @property string $Description
 * @property \Cake\I18n\FrozenTime $Updated_at
 */
class Storagelocation extends Entity
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
        'Assigned_User_ID' => true,
        'Name' => true,
        'Address' => true,
        'Description' => true,
        'Updated_at' => true,
    ];
}
