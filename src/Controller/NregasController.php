<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * Nregas Controller
 *
 * @property \App\Model\Table\NregasTable $Nregas
 *
 * @method \App\Model\Entity\Nrega[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NregasController extends AppController
{

    public function detail()
    {
        $this->request->allowMethod(['post']);
        $village_code=$this->request->getData('village_code');
        $vill_nrega=$this->Nregas->getDetail($village_code);
        if (!$vill_nrega) {
            throw new NotFoundException("No record exist");
        }
        
        $this->set('vill_nrega', $vill_nrega);
        $this->set('_serialize','vill_nrega');
    }

    public function kpi()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $vill_nrega=$this->Nregas->getDetail($village_code);
        if (!$vill_nrega) {
            throw new NotFoundException("No record exist");
        }
       // $totpopulation=$this->Populations->getpopulation(1,$village_code);
        $this->set([
            'success' => true,
            'data' => [
                'total_job_card'=>$vill_nrega->total_job_card
                
            ],
            '_serialize' => ['success', 'data']
        ]);
    } 
}
