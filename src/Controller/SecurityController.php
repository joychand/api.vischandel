<?php
namespace App\Controller;
use Cake\Network\Exception\NotFoundException;

use App\Controller\AppController;

/**
 * Security Controller
 *
 *
 * @method \App\Model\Entity\Security[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SecurityController extends AppController
{

    public function detail()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $vill_security=$this->Populations->getpopulation(2,$village_code);
        if (!$vill_security) {
            throw new NotFoundException("No record exist");
        }
        
        $this->set('vill_security', $vill_security);
        $this->set('_serialize','vill_security');
    }

    public function kpi()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $security_kpi=$this->Populations->getpopulation(2,$village_code);
        if (!$security_kpi) {
            throw new NotFoundException("No record exist");
        }
        $this->set([
            'success' => true,
            'data' => [
                'total_household'=>$security_kpi->total_household ,
                'total_population'=>$security_kpi->total_household
            ],
            '_serialize' => ['success', 'data']
        ]);
    }
   
}
