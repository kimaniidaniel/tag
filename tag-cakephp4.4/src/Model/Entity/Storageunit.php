<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Storageunit Entity
 *
 * @property int $id
 * @property int $storagelocation_id
 * @property string $name
 * @property string $identifier
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\Storagelocation $storagelocation
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Inventory[] $inventory
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
        '*' => true
    ];
}
