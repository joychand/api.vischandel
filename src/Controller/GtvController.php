<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;

use App\Controller\AppController;

/**
 * Gtv Controller
 *
 *
 * @method \App\Model\Entity\Gtv[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GtvController extends AppController
{

    public function detail()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $vill_gtv=$this->Populations->getpopulation(3,$village_code);
        if (!$vill_gtv) {
            throw new NotFoundException("No record exist");
        }
        
        $this->set('vill_gtv', $vill_gtv);
        $this->set('_serialize','vill_gtv');
    }

    public function kpi()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $vill_gtv=$this->Populations->getpopulation(3,$village_code);
        if (!$vill_gtv) {
            throw new NotFoundException("No record exist");
        }
        $this->set([
            'success' => true,
            'data' => [
                'total_household'=>$vill_gtv->total_household ,
                'total_population'=>$vill_gtv->total_household
            ],
            '_serialize' => ['success', 'data']
        ]);
    }
    
}
