<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VillageNsaps Model
 *
 * @method \App\Model\Entity\VillageNsap get($primaryKey, $options = [])
 * @method \App\Model\Entity\VillageNsap newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VillageNsap[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VillageNsap|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageNsap|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageNsap patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VillageNsap[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VillageNsap findOrCreate($search, callable $callback = null, $options = [])
 */
class VillageNsapsTable extends Table
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

        $this->setTable('village_nsaps');
        $this->setDisplayField('village_nsap_id');
        $this->setPrimaryKey('village_nsap_id');
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
            ->integer('village_nsap_id')
            ->allowEmpty('village_nsap_id', 'create');

        $validator
            ->integer('total_widows_beneficiary')
            ->allowEmpty('total_widows_beneficiary');

        $validator
            ->integer('total_handicap_beneficiary')
            ->allowEmpty('total_handicap_beneficiary');

        $validator
            ->integer('total_ignoaps_beneficiary')
            ->allowEmpty('total_ignoaps_beneficiary');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 6)
            ->allowEmpty('village_code');

        $validator
            ->integer('reference_year')
            ->allowEmpty('reference_year');

        return $validator;
    }

    public function getDetail ($village_code=null)
    {
        $nsap_subquery=$this->find()->where(['village_code'=>$village_code]);
        $vill_nsap=$this->find('all',[
             'contain'=>['Villages' => function($q){
                            return $q->select(['Villages.village_code','Villages.village_name']);
                            }]             
                     ])->where(['reference_year'=> $nsap_subquery
                        ->select(['latest_ref'=>$nsap_subquery->func()->max('reference_year')]),'VillageNsaps.village_code'=>$village_code])
                        ->first();
        return $vill_nsap;
       
    }

    
}
