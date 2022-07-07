<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InventoryFixture
 */
class InventoryFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'inventory';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'ItemID' => 1,
                'StorageUnitID' => 1,
                'UserID' => 1,
                'Description' => 'Lorem ipsum dolor sit amet',
                'Number_of_Items' => 1,
                'Arrival_Date' => '2022-07-07',
                'Departure_Date' => '2022-07-07',
                'Updated_at' => 1657156277,
            ],
        ];
        parent::init();
    }
}
