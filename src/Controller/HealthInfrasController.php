<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * HealthInfras Controller
 *
 * @property \App\Model\Table\HealthInfrasTable $HealthInfras
 *
 * @method \App\Model\Entity\HealthInfra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HealthInfrasController extends AppController
{

    public function detail()
    {
        $this->request->allowMethod(['post']);
        $village_code=$this->request->getData('village_code');
        $vill_health=$this->HealthInfras->getDetail($village_code);
        if (!$vill_health) {
            throw new NotFoundException("No record exist");
        }
        
        $this->set('vill_health', $vill_health);
        $this->set('_serialize','vill_health');
    }

    public function kpi()
    {
        $this->request->allowMethod(['post']);
        $village_code=$this->request->getData('village_code');
        $vill_health=$this->HealthInfras->getDetail($village_code);
        if (!$vill_health) {
            throw new NotFoundException("No record exist");
        }
        $this->set([
            'success' => true,
            'data' => [
                'name_of_health_centre'=>$vill_health->name_of_health_centre,
                'asha_mobile'=>$vill_health->asha_mobile
            ],
            '_serialize' => ['success', 'data']
        ]);
    }

}
