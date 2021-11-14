<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Livro extends Entity
{
    protected $_accessible = [
        'genero_id' => true,
        'name' => true,
        'total_paginas' => true,
        'isbn' => true,
        'genero' => true,
        'autors' => true,
        'emprestimos' => true,
    ];
}
