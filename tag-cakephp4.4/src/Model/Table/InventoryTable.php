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
 * @property \App\Model\Table\StorageunitsTable&\Cake\ORM\Association\BelongsTo $Storageunits
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
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

        $this->setTable('Inventory');
        // $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Storageunits', [
            'foreignKey' => 'storageunit_id',
            'joinType' => 'LEFT',
        ]);
        
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
     {
    //     $validator
    //         ->scalar('student_name')
    //         ->maxLength('student_name', 60)
    //         ->requirePresence('student_name', 'create')
    //         ->notEmptyString('student_name');



    //     $validator
    //         ->scalar('student_number')
    //         ->maxLength('student_number', 20)
    //         ->requirePresence('student_number', 'create')
    //         ->notEmptyString('student_number');



        // $validator
        //     ->integer('storageunit_id')
        //     ->requirePresence('storageunit_id', 'create')
        //     ->notEmptyString('storageunit_id');

            
        // $validator
        //     ->integer('user_id')
        //     ->requirePresence('user_id', 'create')
        //     ->notEmptyString('user_id');

    //     $validator
    //         ->integer('storagelocation_id')
    //         ->requirePresence('storagelocation_id', 'create')
    //         ->notEmptyString('storagelocation_id');
            
    //     $validator
    //         ->scalar('description')
    //         ->maxLength('description', 1000)
    //         ->requirePresence('description', 'create')
    //         ->notEmptyString('description');

    //     $validator
    //         ->integer('number_of_items')
    //         ->requirePresence('number_of_items', 'create')
    //         ->notEmptyString('number_of_items');

        // $validator
        //     ->time('timeslot')
        //     ->requirePresence('timeslot', 'create')
        //     ->notEmptyString('timeslot');

        // $validator
        //     ->date('departure_date')
        //     ->requirePresence('departure_date', 'create')
        //     ->notEmptyDate('departure_date');

        // $validator
        //     ->date('arrival_date')
        //     ->requirePresence('arrival_date', 'create')
        //     ->notEmptyDate('arrival_date');

        // $validator
        //     ->date('period')
        //     ->requirePresence('period', 'create')
        //     ->notEmptyDate('period');

        // $validator
        //     ->dateTime('updated_at')
        //     ->notEmptyDateTime('updated_at');

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
        // $rules->add($rules->existsIn('storageunit_id', 'Storageunits'), ['errorField' => 'storageunit_id']);
        // $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
