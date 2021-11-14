<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Genero extends Entity
{
    protected $_accessible = [
        'name' => true,
        'classificacao_indicativa' => true,
        'livros' => true,
    ];
}
