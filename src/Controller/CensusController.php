<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

/**
 * Census Controller
 *
 *
 * @method \App\Model\Entity\Census[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CensusController extends AppController
{

    public function detail()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $vill_census=$this->Populations->getpopulation(4,$village_code);
        if (!$vill_census) {
            throw new NotFoundException("No record exist");
        }
        
        $this->set('vill_census', $vill_census);
        $this->set('_serialize','vill_census');
    }

    public function kpi()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $census_kpi=$this->Populations->getpopulation(4,$village_code);
        if (!$census_kpi) {
            throw new NotFoundException("No record exist");
        }
        $this->set([
            'success' => true,
            'data' => [
                'total_household'=>$census_kpi->total_household ,
                'total_population'=>$census_kpi->total_household
            ],
            '_serialize' => ['success', 'data']
        ]);
    }
}
