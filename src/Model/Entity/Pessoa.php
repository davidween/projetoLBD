<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Pessoa extends Entity
{
    protected $_accessible = [
        'name' => true,
        'cpf' => true,
        'autors' => true,
        'users' => true,
    ];
}
