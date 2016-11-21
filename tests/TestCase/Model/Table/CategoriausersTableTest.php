<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriausersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoriausersTable Test Case
 */
class CategoriausersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoriausersTable
     */
    public $Categoriausers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categoriausers',
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
        $config = TableRegistry::exists('Categoriausers') ? [] : ['className' => 'App\Model\Table\CategoriausersTable'];
        $this->Categoriausers = TableRegistry::get('Categoriausers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Categoriausers);

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
