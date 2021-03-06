<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nregas Model
 *
 * @method \App\Model\Entity\Nrega get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nrega newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Nrega[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nrega|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nrega|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nrega patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nrega[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nrega findOrCreate($search, callable $callback = null, $options = [])
 */
class NregasTable extends Table
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

        $this->setTable('nregas');
        $this->setDisplayField('village_nrega_id');
        $this->setPrimaryKey('village_nrega_id');
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
            ->integer('village_nrega_id')
            ->allowEmpty('village_nrega_id', 'create');

        $validator
            ->integer('nrega_reference_year')
            ->allowEmpty('nrega_reference_year');

        $validator
            ->integer('total_job_card')
            ->allowEmpty('total_job_card');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 6)
            ->allowEmpty('village_code');

        return $validator;
    }
    public function getDetail($village_code)
    {
        $nrega_subquery=$this->find()->where(['village_code'=>$village_code]);
        $vill_nrega=$this->find('all',[
             'contain'=>['Villages' => function($q){
                            return $q->select(['Villages.village_code','Villages.village_name']);
                            }]             
                     ])->where(['nrega_reference_year'=> $nrega_subquery
                        ->select(['latest_ref'=>$nrega_subquery->func()->max('nrega_reference_year')]),'Nregas.village_code'=>$village_code])
                        ->first();
        return  $vill_nrega;

    }
  
}
