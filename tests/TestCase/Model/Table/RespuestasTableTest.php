<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RespuestasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RespuestasTable Test Case
 */
class RespuestasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RespuestasTable
     */
    public $Respuestas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.respuestas',
        'app.preguntas',
        'app.categorias',
        'app.evaluacions',
        'app.evaluacionpreguntas',
        'app.requisitos',
        'app.presentados',
        'app.users',
        'app.bibliotecas',
        'app.categoriausers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Respuestas') ? [] : ['className' => 'App\Model\Table\RespuestasTable'];
        $this->Respuestas = TableRegistry::get('Respuestas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Respuestas);

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
