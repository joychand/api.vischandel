<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * ConnectivityInfras Controller
 *
 * @property \App\Model\Table\ConnectivityInfrasTable $ConnectivityInfras
 *
 * @method \App\Model\Entity\ConnectivityInfra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConnectivityInfrasController extends AppController
{

    public function detail()
    {
        $this->request->allowMethod(['post']);
       // $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $vill_connectivity=$this->ConnectivityInfras->getDetail($village_code);
        if (!$vill_connectivity) {
            throw new NotFoundException("No record exist");
        }
        
        $this->set('vill_connectivity', $vill_connectivity);
        $this->set('_serialize','vill_connectivity');
    }

    public function kpi()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $electorals_kpi=$this->ConnectivityInfras->getDetail($village_code);
        if (!$electorals_kpi) {
            throw new NotFoundException("No record exist");
        }
        $this->set([
            'success' => true,
            'data' => [
                'approached_road_status'=>$electorals_kpi->approached_road_status ,
                'electoral_total_voter'=>$electorals_kpi->distance_from_appr_road
            ],
            '_serialize' => ['success', 'data']
        ]);
    }
}
