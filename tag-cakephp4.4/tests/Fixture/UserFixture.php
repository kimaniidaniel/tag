<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserFixture
 */
class UserFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'user';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'UserID' => 1,
                'FirstName' => 'Lorem ipsum dolor sit amet',
                'LastName' => 'Lorem ipsum dolor sit amet',
                'UserName' => 'Lorem ipsum dolor ',
                'Password' => 'Lorem ipsum dolor ',
                'Term' => 'Lorem ipsum dolor sit amet',
                'Role' => 'Lorem ipsum dolor sit amet',
                'Identifier' => 'Lorem ipsum dolor ',
                'Email' => 'Lorem ipsum dolor ',
                'Address' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
