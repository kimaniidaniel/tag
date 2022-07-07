<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * User Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UserTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('user');
        $this->setDisplayField('UserID');
        $this->setPrimaryKey('UserID');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('FirstName')
            ->maxLength('FirstName', 50)
            ->requirePresence('FirstName', 'create')
            ->notEmptyString('FirstName');

        $validator
            ->scalar('LastName')
            ->maxLength('LastName', 50)
            ->requirePresence('LastName', 'create')
            ->notEmptyString('LastName');

        $validator
            ->scalar('UserName')
            ->maxLength('UserName', 20)
            ->requirePresence('UserName', 'create')
            ->notEmptyString('UserName');

        $validator
            ->scalar('Password')
            ->maxLength('Password', 20)
            ->requirePresence('Password', 'create')
            ->notEmptyString('Password');

        $validator
            ->scalar('Term')
            ->requirePresence('Term', 'create')
            ->notEmptyString('Term');

        $validator
            ->scalar('Role')
            ->requirePresence('Role', 'create')
            ->notEmptyString('Role');

        $validator
            ->scalar('Identifier')
            ->maxLength('Identifier', 20)
            ->requirePresence('Identifier', 'create')
            ->notEmptyString('Identifier');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 20)
            ->requirePresence('Email', 'create')
            ->notEmptyString('Email');

        $validator
            ->scalar('Address')
            ->maxLength('Address', 50)
            ->requirePresence('Address', 'create')
            ->notEmptyString('Address');

        return $validator;
    }
}
