<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PreguntasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PreguntasTable Test Case
 */
class PreguntasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PreguntasTable
     */
    public $Preguntas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.preguntas',
        'app.categorias',
        'app.evaluacions',
        'app.evaluacionpreguntas',
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
        $config = TableRegistry::exists('Preguntas') ? [] : ['className' => 'App\Model\Table\PreguntasTable'];
        $this->Preguntas = TableRegistry::get('Preguntas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Preguntas);

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
