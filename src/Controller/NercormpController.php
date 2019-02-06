<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * Nercormp Controller
 *
 *
 * @method \App\Model\Entity\Nercormp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NercormpController extends AppController
{
 
    public function detail()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $vill_nercormp=$this->Populations->getpopulation(1,$village_code);
        if (!$vill_nercormp) {
            throw new NotFoundException("No record exist");
        }
        
        $this->set('vill_nercormp', $vill_nercormp);
        $this->set('_serialize','vill_nercormp');
    }

    public function kpi()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $nercormp_kpi=$this->Populations->getpopulation(1,$village_code);
        if (!$nercormp_kpi) {
            throw new NotFoundException("No record exist");
        }
        $this->set([
            'success' => true,
            'data' => [
                'total_household'=>$nercormp_kpi->total_household ,
                'total_population'=>$nercormp_kpi->total_population
            ],
            '_serialize' => ['success', 'data']
        ]);
    }
    
}
