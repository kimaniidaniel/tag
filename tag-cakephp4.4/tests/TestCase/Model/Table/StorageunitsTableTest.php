<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StorageunitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StorageunitsTable Test Case
 */
class StorageunitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StorageunitsTable
     */
    protected $Storageunits;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Storageunits',
        'app.Storagelocations',
        'app.Users',
        'app.Inventory',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Storageunits') ? [] : ['className' => StorageunitsTable::class];
        $this->Storageunits = $this->getTableLocator()->get('Storageunits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Storageunits);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StorageunitsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StorageunitsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
