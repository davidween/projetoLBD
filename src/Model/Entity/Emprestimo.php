<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Emprestimo extends Entity
{
    protected $_accessible = [
        'user_id' => true,
        'status' => true,
        'created' => true,
        'user' => true,
        'livros' => true,
    ];
}
