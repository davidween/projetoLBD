<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class GenerosTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('generos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Livros', [
            'foreignKey' => 'genero_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('classificacao_indicativa')
            ->requirePresence('classificacao_indicativa', 'create')
            ->notEmptyString('classificacao_indicativa');

        return $validator;
    }
}
