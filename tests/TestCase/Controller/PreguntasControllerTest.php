<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PreguntasController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PreguntasController Test Case
 */
class PreguntasControllerTest extends IntegrationTestCase
{

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
