<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AutorsTable;
use Cake\TestSuite\TestCase;

class AutorsTableTest extends TestCase
{
    protected $Autors;

    protected $fixtures = [
        'app.Autors',
        'app.Pessoas',
        'app.Livros',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Autors') ? [] : ['className' => AutorsTable::class];
        $this->Autors = $this->getTableLocator()->get('Autors', $config);
    }

    public function tearDown(): void
    {
        unset($this->Autors);

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
