<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RespuestasController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RespuestasController Test Case
 */
class RespuestasControllerTest extends IntegrationTestCase
{

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
        'app.categorias_evaluacions',
        'app.nivels',
        'app.tipos'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
