<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PresentadosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PresentadosTable Test Case
 */
class PresentadosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PresentadosTable
     */
    public $Presentados;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.presentados',
        'app.users',
        'app.bibliotecas',
        'app.categorias',
        'app.preguntas',
        'app.evaluacionpreguntas',
        'app.evaluacions',
        'app.requisitos',
        'app.respuestas',
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
        $config = TableRegistry::exists('Presentados') ? [] : ['className' => 'App\Model\Table\PresentadosTable'];
        $this->Presentados = TableRegistry::get('Presentados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Presentados);

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
