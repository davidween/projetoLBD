<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivrosTable;
use Cake\TestSuite\TestCase;

class LivrosTableTest extends TestCase
{
    protected $Livros;

    protected $fixtures = [
        'app.Livros',
        'app.Generos',
        'app.Autors',
        'app.Emprestimos',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Livros') ? [] : ['className' => LivrosTable::class];
        $this->Livros = $this->getTableLocator()->get('Livros', $config);
    }

    public function tearDown(): void
    {
        unset($this->Livros);

        parent::tearDown();
    }

    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
