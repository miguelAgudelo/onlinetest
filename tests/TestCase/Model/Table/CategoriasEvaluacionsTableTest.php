<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriasEvaluacionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoriasEvaluacionsTable Test Case
 */
class CategoriasEvaluacionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoriasEvaluacionsTable
     */
    public $CategoriasEvaluacions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categorias_evaluacions',
        'app.categorias',
        'app.preguntas',
        'app.evaluacions',
        'app.evaluacionpreguntas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CategoriasEvaluacions') ? [] : ['className' => 'App\Model\Table\CategoriasEvaluacionsTable'];
        $this->CategoriasEvaluacions = TableRegistry::get('CategoriasEvaluacions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategoriasEvaluacions);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
