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
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'storageunit_id' => 1,
                'user_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'number_of_items' => 1,
                'arival_date' => '2022-07-07',
                'departure_date' => '2022-07-07',
                'updated_at' => 1657201428,
            ],
        ];
        parent::init();
    }
}
