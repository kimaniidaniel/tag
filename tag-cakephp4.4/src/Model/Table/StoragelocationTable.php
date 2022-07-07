<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Storagelocation Model
 *
 * @method \App\Model\Entity\Storagelocation newEmptyEntity()
 * @method \App\Model\Entity\Storagelocation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Storagelocation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Storagelocation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Storagelocation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Storagelocation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Storagelocation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Storagelocation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Storagelocation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Storagelocation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Storagelocation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Storagelocation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Storagelocation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StoragelocationTable extends Table
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

        $this->setTable('storagelocation');
        $this->setDisplayField('StorageLocationID');
        $this->setPrimaryKey('StorageLocationID');
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
            ->integer('Assigned_User_ID')
            ->requirePresence('Assigned_User_ID', 'create')
            ->notEmptyString('Assigned_User_ID')
            ->add('Assigned_User_ID', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('Name')
            ->maxLength('Name', 50)
            ->requirePresence('Name', 'create')
            ->notEmptyString('Name');

        $validator
            ->scalar('Address')
            ->maxLength('Address', 50)
            ->requirePresence('Address', 'create')
            ->notEmptyString('Address');

        $validator
            ->scalar('Description')
            ->requirePresence('Description', 'create')
            ->notEmptyString('Description');

        $validator
            ->dateTime('Updated_at')
            ->notEmptyDateTime('Updated_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['Assigned_User_ID']), ['errorField' => 'Assigned_User_ID']);

        return $rules;
    }
}
