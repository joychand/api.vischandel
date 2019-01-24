<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HealthInfras Model
 *
 * @method \App\Model\Entity\HealthInfra get($primaryKey, $options = [])
 * @method \App\Model\Entity\HealthInfra newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HealthInfra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HealthInfra|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HealthInfra|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HealthInfra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HealthInfra[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HealthInfra findOrCreate($search, callable $callback = null, $options = [])
 */
class HealthInfrasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('health_infras');
        $this->setDisplayField('health_infra_id');
        $this->setPrimaryKey('health_infra_id');
        $this->belongsTo('Villages',[
            'className'=>'Villages'
        ])
        ->setForeignKey('village_code');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('health_infra_id')
            ->allowEmpty('health_infra_id', 'create');

        $validator
            ->integer('health_reference_year')
            ->allowEmpty('health_reference_year');

        $validator
            ->integer('no_of_doctors')
            ->allowEmpty('no_of_doctors');

        $validator
            ->integer('no_of_anm')
            ->allowEmpty('no_of_anm');

        $validator
            ->integer('no_of_staff_nurse')
            ->allowEmpty('no_of_staff_nurse');

        $validator
            ->integer('no_of_asha')
            ->allowEmpty('no_of_asha');

        $validator
            ->scalar('asha_mobile')
            ->maxLength('asha_mobile', 10)
            ->allowEmpty('asha_mobile');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 6)
            ->allowEmpty('village_code');

        $validator
            ->scalar('name_of_health_centre')
            ->maxLength('name_of_health_centre', 200)
            ->allowEmpty('name_of_health_centre');

        return $validator;
    }

    public function getDetail($village_code)
    
    {
        $health_subquery=$this->find()->where(['village_code'=>$village_code]);
        $vill_health=$this->find('all',[
             'contain'=>['Villages' => function($q){
                            return $q->select(['Villages.village_code','Villages.village_name']);
                            }]             
                     ])->where(['health_reference_year'=> $health_subquery
                        ->select(['latest_ref'=>$health_subquery->func()->max('health_reference_year')]),'HealthInfras.village_code'=>$village_code])
                        ->first();
        return  $vill_health;
    }
   
}
