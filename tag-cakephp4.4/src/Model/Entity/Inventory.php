<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inventory Entity
 *
 * @property int $ItemID
 * @property int $StorageUnitID
 * @property int $UserID
 * @property string $Description
 * @property int $Number_of_Items
 * @property \Cake\I18n\FrozenDate $Arrival_Date
 * @property \Cake\I18n\FrozenDate $Departure_Date
 * @property \Cake\I18n\FrozenTime $Updated_at
 */
class Inventory extends Entity
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
        'StorageUnitID' => true,
        'UserID' => true,
        'Description' => true,
        'Number_of_Items' => true,
        'Arrival_Date' => true,
        'Departure_Date' => true,
        'Updated_at' => true,
    ];
}
