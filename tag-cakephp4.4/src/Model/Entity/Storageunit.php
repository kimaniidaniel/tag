<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Storageunit Entity
 *
 * @property int $StorageUnitID
 * @property int $StorageLocationID
 * @property string $StorageName
 * @property int $Assigned_User_ID
 * @property \Cake\I18n\FrozenTime $Updated_at
 */
class Storageunit extends Entity
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
        'StorageLocationID' => true,
        'StorageName' => true,
        'Assigned_User_ID' => true,
        'Updated_at' => true,
    ];
}
