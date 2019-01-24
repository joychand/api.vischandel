<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

/**
 * EducationInfras Controller
 *
 * @property \App\Model\Table\EducationInfrasTable $EducationInfras
 *
 * @method \App\Model\Entity\EducationInfra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EducationInfrasController extends AppController
{

    public function detail()
    {
        $this->request->allowMethod(['post']);
        $village_code=$this->request->getData('village_code');
        $vill_edn=$this->EducationInfras->getDetail($village_code);
        if (!$vill_edn) {
            throw new NotFoundException("No record exist");
        }
        
        $this->set('vill_edn', $vill_edn);
        $this->set('_serialize','vill_edn');
    }

    public function kpi()
    {
        $this->request->allowMethod(['post']);
        $village_code=$this->request->getData('village_code');
        $vill_edn=$this->EducationInfras->getDetail($village_code);
        if (!$vill_edn) {
            throw new NotFoundException("No record exist");
        }
        $this->set([
            'success' => true,
            'data' => [
                'total_govt_school'=>$vill_edn->total_govt_school + $vill_edn->total_adc_school + $vill_edn->total_private_school  ,
                'total_hrsec_student'=>$vill_edn->total_primary_student + $vill_edn->total_jhs_student + $vill_edn->total_secondary_student + $vill_edn->total_hrsec_student
            ],
            '_serialize' => ['success', 'data']
        ]);
    }
}
