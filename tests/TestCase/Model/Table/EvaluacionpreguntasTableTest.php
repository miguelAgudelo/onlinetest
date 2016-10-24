<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EvaluacionpreguntasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EvaluacionpreguntasTable Test Case
 */
class EvaluacionpreguntasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EvaluacionpreguntasTable
     */
    public $Evaluacionpreguntas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.evaluacionpreguntas',
        'app.evaluacions',
        'app.categorias',
        'app.preguntas',
        'app.nivels',
        'app.tipos',
        'app.respuestas',
        'app.categorias_evaluacions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Evaluacionpreguntas') ? [] : ['className' => 'App\Model\Table\EvaluacionpreguntasTable'];
        $this->Evaluacionpreguntas = TableRegistry::get('Evaluacionpreguntas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Evaluacionpreguntas);

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
