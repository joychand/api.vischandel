<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * VillageElectorals Controller
 *
 * @property \App\Model\Table\VillageElectoralsTable $VillageElectorals
 *
 * @method \App\Model\Entity\VillageElectoral[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillageElectoralsController extends AppController
{
 
    public function detail()
    {
        $this->request->allowMethod(['post']);
       // $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $vill_electorals=$this->VillageElectorals->getDetail($village_code);
        if (!$vill_electorals) {
            throw new NotFoundException("No record exist");
        }
        
        $this->set('vill_electorals', $vill_electorals);
        $this->set('_serialize','vill_electorals');
    }

    public function kpi()
    {
        $this->request->allowMethod(['post']);
       // $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $electorals_kpi=$this->VillageElectorals->getDetail($village_code);
        if (!$electorals_kpi) {
            throw new NotFoundException("No record exist");
        }
        $this->set([
            'success' => true,
            'data' => [
                'electoral_total_household'=>$electorals_kpi->electoral_total_household ,
                'electoral_total_voter'=>$electorals_kpi->electoral_total_voter
            ],
            '_serialize' => ['success', 'data']
        ]);
    }

    
}
