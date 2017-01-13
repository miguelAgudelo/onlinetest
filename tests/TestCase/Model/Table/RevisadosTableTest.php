<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RevisadosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RevisadosTable Test Case
 */
class RevisadosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RevisadosTable
     */
    public $Revisados;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.revisados',
        'app.resultados',
        'app.evaluacionpreguntas',
        'app.evaluacions',
        'app.categorias',
        'app.preguntas',
        'app.respuestas',
        'app.categoriausers',
        'app.users',
        'app.bibliotecas',
        'app.presentados',
        'app.requisitos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Revisados') ? [] : ['className' => 'App\Model\Table\RevisadosTable'];
        $this->Revisados = TableRegistry::get('Revisados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Revisados);

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
