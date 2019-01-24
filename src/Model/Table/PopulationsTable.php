<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Populations Model
 *
 * @method \App\Model\Entity\Population get($primaryKey, $options = [])
 * @method \App\Model\Entity\Population newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Population[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Population|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Population|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Population patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Population[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Population findOrCreate($search, callable $callback = null, $options = [])
 */
class PopulationsTable extends Table
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

        $this->setTable('populations');
        $this->setDisplayField('reference_year');
        $this->setPrimaryKey(['reference_year', 'village_code', 'counting_agency']);
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
            ->integer('reference_year')
            ->allowEmpty('reference_year', 'create');

        $validator
            ->integer('total_household')
            ->allowEmpty('total_household');

        $validator
            ->integer('total_population')
            ->allowEmpty('total_population');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 6)
            ->allowEmpty('village_code', 'create');

        $validator
            ->integer('counting_agency')
            ->allowEmpty('counting_agency', 'create');

        return $validator;
    }

    public function getpopulation($agency_id=null,$village_code=null)

    {
       // $this->loadModel('Populations');
        $pop_subquery= $this->find()->where(['village_code'=>$village_code, 'counting_agency'=>$agency_id]);       
        $pop = $this->find('all')->where(['reference_year'=> $pop_subquery
                        ->select(['latest_ref'=>$pop_subquery->func()->max('reference_year')]),'village_code'=>$village_code, 'counting_agency'=>$agency_id])
                        ->first();
        return $pop;
    }
}
