<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StorageunitsFixture
 */
class StorageunitsFixture extends TestFixture
{
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
                'storagelocation_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'identifier' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'updated_at' => 1657190999,
            ],
        ];
        parent::init();
    }
}
