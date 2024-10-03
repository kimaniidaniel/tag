<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StoragelocationFixture
 */
class StoragelocationFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'storagelocation';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'StorageLocationID' => 1,
                'Assigned_User_ID' => 1,
                'Name' => 'Lorem ipsum dolor sit amet',
                'Address' => 'Lorem ipsum dolor sit amet',
                'Description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'Updated_at' => 1657156312,
            ],
        ];
        parent::init();
    }
}
