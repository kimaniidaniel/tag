<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Storageunits Model
 *
 * @property \App\Model\Table\StoragelocationsTable&\Cake\ORM\Association\BelongsTo $Storagelocations
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\InventoryTable&\Cake\ORM\Association\HasMany $Inventory
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
class StorageunitsTable extends Table
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

        $this->setTable('storageunits');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Storagelocations', [
            'foreignKey' => 'storagelocation_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Inventory', [
            'foreignKey' => 'storageunit_id',
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
        $validator
            ->integer('storagelocation_id')
            ->requirePresence('storagelocation_id', 'create')
            ->notEmptyString('storagelocation_id');
            // ->add('storagelocation_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('identifier')
            ->maxLength('identifier', 60)
            ->requirePresence('identifier', 'create')
            ->notEmptyString('identifier');

        $validator
            ->integer('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmptyString('user_id');

        $validator
            ->dateTime('updated_at')
            ->notEmptyDateTime('updated_at');

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
        $rules->add($rules->existsIn('storagelocation_id', 'Storagelocations'), ['errorField' => 'storagelocation_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
