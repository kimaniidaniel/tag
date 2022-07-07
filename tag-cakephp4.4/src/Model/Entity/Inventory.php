<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inventory Entity
 *
 * @property int $id
 * @property string $name
 * @property int $storageunit_id
 * @property int $user_id
 * @property string $description
 * @property int $number_of_items
 * @property \Cake\I18n\FrozenDate $arival_date
 * @property \Cake\I18n\FrozenDate $departure_date
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\Storageunit $storageunit
 * @property \App\Model\Entity\User $user
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
        'name' => true,
        'storageunit_id' => true,
        'user_id' => true,
        'description' => true,
        'number_of_items' => true,
        'arival_date' => true,
        'departure_date' => true,
        'updated_at' => true,
        'storageunit' => true,
        'user' => true,
    ];
}
