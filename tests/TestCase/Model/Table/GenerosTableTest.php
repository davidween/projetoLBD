<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GenerosTable;
use Cake\TestSuite\TestCase;

class GenerosTableTest extends TestCase
{
    protected $Generos;

    protected $fixtures = [
        'app.Generos',
        'app.Livros',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Generos') ? [] : ['className' => GenerosTable::class];
        $this->Generos = $this->getTableLocator()->get('Generos', $config);
    }

    public function tearDown(): void
    {
        unset($this->Generos);

        parent::tearDown();
    }

    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
