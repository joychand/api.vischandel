<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Villages Controller
 *
 * @property \App\Model\Table\VillagesTable $Villages
 *
 * @method \App\Model\Entity\Village[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->request->allowMethod(['post']);
        $villages = $this->Villages->find('list',[
            'keyField'=>'village_code',
            'valueField'=>'village_name'
        ])->where(['sub_district_code'=>$this->request->getData('subdistrict_code')])
        ->order(['Villages.village_name'=>'ASC']);

        $this->set(compact('villages'));
        $this->set('_serialize','villages');
    }

   
}
