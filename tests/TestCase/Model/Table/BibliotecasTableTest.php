<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BibliotecasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BibliotecasTable Test Case
 */
class BibliotecasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BibliotecasTable
     */
    public $Bibliotecas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bibliotecas',
        'app.users',
        'app.categorias',
        'app.preguntas',
        'app.nivels',
        'app.tipos',
        'app.evaluacionpreguntas',
        'app.evaluacions',
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
        $config = TableRegistry::exists('Bibliotecas') ? [] : ['className' => 'App\Model\Table\BibliotecasTable'];
        $this->Bibliotecas = TableRegistry::get('Bibliotecas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bibliotecas);

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
