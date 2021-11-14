<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PessoasTable;
use Cake\TestSuite\TestCase;

class PessoasTableTest extends TestCase
{
    protected $Pessoas;

    protected $fixtures = [
        'app.Pessoas',
        'app.Autors',
        'app.Users',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pessoas') ? [] : ['className' => PessoasTable::class];
        $this->Pessoas = $this->getTableLocator()->get('Pessoas', $config);
    }

    public function tearDown(): void
    {
        unset($this->Pessoas);

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
