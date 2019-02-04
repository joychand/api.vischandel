<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * Hillhouses Controller
 *
 *
 * @method \App\Model\Entity\Hillhouse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HillhousesController extends AppController
{

    public function detail()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $vill_hillhouse=$this->Populations->getpopulation(5,$village_code);
        if (!$vill_hillhouse) {
            throw new NotFoundException("No record exist");
        }
        
        $this->set('vill_hillhouse', $vill_hillhouse);
        $this->set('_serialize','vill_hillhouse');
    }

    public function kpi()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $hillhouse_kpi=$this->Populations->getpopulation(5,$village_code);
        if (!$hillhouse_kpi) {
            throw new NotFoundException("No record exist");
        }
        $this->set([
            'success' => true,
            'data' => [
                'total_household'=>$hillhouse_kpi->total_household ,
                'total_population'=>$hillhouse_kpi->total_household
            ],
            '_serialize' => ['success', 'data']
        ]);
    }
    
}
