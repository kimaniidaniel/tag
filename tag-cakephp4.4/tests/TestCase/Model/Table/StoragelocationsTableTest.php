<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoragelocationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoragelocationsTable Test Case
 */
class StoragelocationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StoragelocationsTable
     */
    protected $Storagelocations;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Storagelocations',
        'app.Users',
        'app.Storageunits',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Storagelocations') ? [] : ['className' => StoragelocationsTable::class];
        $this->Storagelocations = $this->getTableLocator()->get('Storagelocations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Storagelocations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StoragelocationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StoragelocationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
