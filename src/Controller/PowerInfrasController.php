<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * PowerInfras Controller
 *
 * @property \App\Model\Table\PowerInfrasTable $PowerInfras
 *
 * @method \App\Model\Entity\PowerInfra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PowerInfrasController extends AppController
{
    public function detail(){

   
    $this->request->allowMethod(['post']);
    // $this->loadModel('Populations');
     $village_code=$this->request->getData('village_code');
     $vill_power=$this->PowerInfras->getDetail($village_code);
     if (!$vill_power) {
         throw new NotFoundException("No record exist");
     }
     
     $this->set('vill_power', $vill_power);
     $this->set('_serialize','vill_power');
 }

 public function kpi()
 {
     $this->request->allowMethod(['post']);
     //$this->loadModel('Populations');
     $village_code=$this->request->getData('village_code');
     $power_kpi=$this->PowerInfras->getDetail($village_code);
     if (!$power_kpi) {
         throw new NotFoundException("No record exist");
     }
     $this->set([
         'success' => true,
         'data' => [
             'household_no'=>$power_kpi->household_no ,
             'electrified_household_no'=>$power_kpi->electrified_household_no
         ],
         '_serialize' => ['success', 'data']
     ]);
 }
}
