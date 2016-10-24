<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NivelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NivelsTable Test Case
 */
class NivelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NivelsTable
     */
    public $Nivels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nivels',
        'app.preguntas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Nivels') ? [] : ['className' => 'App\Model\Table\NivelsTable'];
        $this->Nivels = TableRegistry::get('Nivels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nivels);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
