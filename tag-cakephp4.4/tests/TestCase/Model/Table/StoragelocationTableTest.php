<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoragelocationTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoragelocationTable Test Case
 */
class StoragelocationTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StoragelocationTable
     */
    protected $Storagelocation;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Storagelocation',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Storagelocation') ? [] : ['className' => StoragelocationTable::class];
        $this->Storagelocation = $this->getTableLocator()->get('Storagelocation', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Storagelocation);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StoragelocationTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StoragelocationTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
