<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        'pessoa_id' => true,
        'username' => true,
        'password' => true,
        'pessoa' => true,
        'emprestimos' => true,
    ];
    
    protected $_hidden = [
        'password',
    ];
}
