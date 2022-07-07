<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inventory Model
 *
 * @method \App\Model\Entity\Inventory newEmptyEntity()
 * @method \App\Model\Entity\Inventory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Inventory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inventory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inventory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Inventory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inventory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inventory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inventory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inventory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Inventory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Inventory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Inventory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class InventoryTable extends Table
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

        $this->setTable('inventory');
        $this->setDisplayField('ItemID');
        $this->setPrimaryKey('ItemID');
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
            ->integer('StorageUnitID')
            ->requirePresence('StorageUnitID', 'create')
            ->notEmptyString('StorageUnitID')
            ->add('StorageUnitID', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('UserID')
            ->requirePresence('UserID', 'create')
            ->notEmptyString('UserID');

        $validator
            ->scalar('Description')
            ->maxLength('Description', 100)
            ->requirePresence('Description', 'create')
            ->notEmptyString('Description');

        $validator
            ->integer('Number_of_Items')
            ->requirePresence('Number_of_Items', 'create')
            ->notEmptyString('Number_of_Items');

        $validator
            ->date('Arrival_Date')
            ->requirePresence('Arrival_Date', 'create')
            ->notEmptyDate('Arrival_Date');

        $validator
            ->date('Departure_Date')
            ->requirePresence('Departure_Date', 'create')
            ->notEmptyDate('Departure_Date');

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
        $rules->add($rules->isUnique(['StorageUnitID']), ['errorField' => 'StorageUnitID']);

        return $rules;
    }
}
