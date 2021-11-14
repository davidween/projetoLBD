<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LivrosFixture
 */
class LivrosFixture extends TestFixture
{
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'genero_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'total_paginas' => 1,
                'isbn' => 'Lorem ipsum',
            ],
        ];
        parent::init();
    }
}
