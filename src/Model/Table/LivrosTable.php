<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class LivrosTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('livros');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Generos', [
            'foreignKey' => 'genero_id',
        ]);
        $this->belongsToMany('Autors', [
            'foreignKey' => 'livro_id',
            'targetForeignKey' => 'autor_id',
            'joinTable' => 'autors_livros',
        ]);
        $this->belongsToMany('Emprestimos', [
            'foreignKey' => 'livro_id',
            'targetForeignKey' => 'emprestimo_id',
            'joinTable' => 'emprestimos_livros',
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
            ->integer('total_paginas')
            ->requirePresence('total_paginas', 'create')
            ->notEmptyString('total_paginas');

        $validator
            ->scalar('isbn')
            ->maxLength('isbn', 13)
            ->requirePresence('isbn', 'create')
            ->notEmptyString('isbn')
            ->add('isbn', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['isbn']), ['errorField' => 'isbn']);
        $rules->add($rules->existsIn('genero_id', 'Generos'), ['errorField' => 'genero_id']);

        return $rules;
    }
}
