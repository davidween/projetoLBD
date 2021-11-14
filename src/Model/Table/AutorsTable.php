<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AutorsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('autors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id',
        ]);
        $this->belongsToMany('Livros', [
            'foreignKey' => 'autor_id',
            'targetForeignKey' => 'livro_id',
            'joinTable' => 'autors_livros',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 14)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

        return $validator;
    }
    
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('pessoa_id', 'Pessoas'), ['errorField' => 'pessoa_id']);

        return $rules;
    }
}
