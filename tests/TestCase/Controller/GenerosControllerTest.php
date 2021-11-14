<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\GenerosController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class GenerosControllerTest extends TestCase
{
    use IntegrationTestTrait;

    protected $fixtures = [
        'app.Generos',
        'app.Livros',
    ];

    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
