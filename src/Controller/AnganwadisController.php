<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * Anganwadis Controller
 *
 * @property \App\Model\Table\AnganwadisTable $Anganwadis
 *
 * @method \App\Model\Entity\Anganwadi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnganwadisController extends AppController
{
  
   

    
    public function detail()
    {
        $this->request->allowMethod(['post']);
        $village_code=$this->request->getData('village_code');
        $vill_anganwadi=$this->Anganwadis->getDetail($village_code);
        if (!$vill_anganwadi) {
            throw new NotFoundException("No record exist");
        }
        
        $this->set('vill_anganwadi', $vill_anganwadi);
        $this->set('_serialize','vill_anganwadi');
    }

    public function kpi()
    {
        $this->request->allowMethod(['post']);
        $village_code=$this->request->getData('village_code');
        $vill_anganwadi=$this->Anganwadis->getDetail($village_code);
        if (!$vill_anganwadi) {
            throw new NotFoundException("No record exist");
        }
        $this->set([
            'success' => true,
            'data' => [
                'total_anganwadi_worker'=>$vill_anganwadi->total_anganwadi_worker ,
                'total_enrolled_children'=>$vill_anganwadi->total_enrolled_children
            ],
            '_serialize' => ['success', 'data']
        ]);
    }
   
}
