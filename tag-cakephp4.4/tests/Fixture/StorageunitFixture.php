<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StorageunitFixture
 */
class StorageunitFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'storageunit';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'StorageUnitID' => 1,
                'StorageLocationID' => 1,
                'StorageName' => 'Lorem ipsum dolor sit amet',
                'Assigned_User_ID' => 1,
                'Updated_at' => 1657156306,
            ],
        ];
        parent::init();
    }
}
