<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EvaluacionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EvaluacionsTable Test Case
 */
class EvaluacionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EvaluacionsTable
     */
    public $Evaluacions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.evaluacions',
        'app.evaluacionpreguntas',
        'app.preguntas',
        'app.categorias',
        'app.categorias_evaluacions',
        'app.nivels',
        'app.tipos',
        'app.respuestas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Evaluacions') ? [] : ['className' => 'App\Model\Table\EvaluacionsTable'];
        $this->Evaluacions = TableRegistry::get('Evaluacions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Evaluacions);

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
