<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * VillageDisableInfos Controller
 *
 * @property \App\Model\Table\VillageDisableInfosTable $VillageDisableInfos
 *
 * @method \App\Model\Entity\VillageDisableInfo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillageDisableInfosController extends AppController
{
    public function detail(){

   
        $this->request->allowMethod(['post']);
        // $this->loadModel('Populations');
         $village_code=$this->request->getData('village_code');
         $vill_disable=$this->VillageDisableInfos->getDetail($village_code);
         if (!$vill_disable) {
             throw new NotFoundException("No record exist");
         }
         
         $this->set('vill_disable', $vill_disable);
         $this->set('_serialize','vill_disable');
     }
    
     public function kpi()
     {
         $this->request->allowMethod(['post']);
         //$this->loadModel('Populations');
         $village_code=$this->request->getData('village_code');
         $disable_kpi=$this->VillageDisableInfos->getDetail($village_code);
         if (!$disable_kpi) {
             throw new NotFoundException("No record exist");
         }
         $this->set([
             'success' => true,
             'data' => [
                 'Total_Diff_Abled'=>$disable_kpi->blind + $disable_kpi->deaf + $disable_kpi->others 
                
             ],
             '_serialize' => ['success', 'data']
         ]);
     }
   
}
