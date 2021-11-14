<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmprestimosTable;
use Cake\TestSuite\TestCase;

class EmprestimosTableTest extends TestCase
{
    protected $Emprestimos;

    protected $fixtures = [
        'app.Emprestimos',
        'app.Users',
        'app.Livros',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Emprestimos') ? [] : ['className' => EmprestimosTable::class];
        $this->Emprestimos = $this->getTableLocator()->get('Emprestimos', $config);
    }

    public function tearDown(): void
    {
        unset($this->Emprestimos);

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
