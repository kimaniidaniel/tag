<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StorageunitTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StorageunitTable Test Case
 */
class StorageunitTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StorageunitTable
     */
    protected $Storageunit;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Storageunit',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Storageunit') ? [] : ['className' => StorageunitTable::class];
        $this->Storageunit = $this->getTableLocator()->get('Storageunit', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Storageunit);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StorageunitTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StorageunitTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
