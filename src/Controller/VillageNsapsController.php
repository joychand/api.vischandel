<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VillageNsaps Controller
 *
 * @property \App\Model\Table\VillageNsapsTable $VillageNsaps
 *
 * @method \App\Model\Entity\VillageNsap[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillageNsapsController extends AppController
{

    public function detail()
    {
        $this->request->allowMethod(['post']);
        $village_code=$this->request->getData('village_code');
        $vill_nsap=$this->VillageNsaps->getDetail($village_code);
        if (!$vill_nsap) {
            throw new NotFoundException("No record exist");
        }
        
        $this->set('vill_nsap', $vill_nsap);
        $this->set('_serialize','vill_nsap');
    }

    public function kpi()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $vill_nsap=$this->VillageNsaps->getDetail($village_code);
        if (!$vill_nsap) {
            throw new NotFoundException("No record exist");
        }
        $totpopulation=$this->Populations->getpopulation(1,$village_code);
        $this->set([
            'success' => true,
            'data' => [
                'total_widows_beneficiary'=>$vill_nsap->total_widows_beneficiary + $vill_nsap->total_handicap_beneficiary + $vill_nsap->total_ignoaps_beneficiary,
                'totpopulation'=>$totpopulation->total_population,
                'tothousehold'=>$totpopulation->total_household,
            ],
            '_serialize' => ['success', 'data']
        ]);
    }
   
}
