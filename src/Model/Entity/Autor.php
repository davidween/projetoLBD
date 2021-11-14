<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Autor extends Entity
{
    protected $_accessible = [
        'pessoa_id' => true,
        'telefone' => true,
        'pessoa' => true,
        'livros' => true,
    ];
}
