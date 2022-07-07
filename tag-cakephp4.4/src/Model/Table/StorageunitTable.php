<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Storageunit Model
 *
 * @method \App\Model\Entity\Storageunit newEmptyEntity()
 * @method \App\Model\Entity\Storageunit newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Storageunit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Storageunit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Storageunit findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Storageunit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Storageunit[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Storageunit|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Storageunit saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Storageunit[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Storageunit[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Storageunit[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Storageunit[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StorageunitTable extends Table
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

        $this->setTable('storageunit');
        $this->setDisplayField('StorageUnitID');
        $this->setPrimaryKey('StorageUnitID');
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
            ->integer('StorageLocationID')
            ->requirePresence('StorageLocationID', 'create')
            ->notEmptyString('StorageLocationID')
            ->add('StorageLocationID', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('StorageName')
            ->maxLength('StorageName', 50)
            ->requirePresence('StorageName', 'create')
            ->notEmptyString('StorageName');

        $validator
            ->integer('Assigned_User_ID')
            ->requirePresence('Assigned_User_ID', 'create')
            ->notEmptyString('Assigned_User_ID');

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
        $rules->add($rules->isUnique(['StorageLocationID']), ['errorField' => 'StorageLocationID']);

        return $rules;
    }
}
