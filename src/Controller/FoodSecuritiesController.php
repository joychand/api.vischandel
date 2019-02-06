<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

/**
 * FoodSecurities Controller
 *
 * @property \App\Model\Table\FoodSecuritiesTable $FoodSecurities
 *
 * @method \App\Model\Entity\FoodSecurity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FoodSecuritiesController extends AppController
{
    public function detail()
    {
        $this->request->allowMethod(['post']);
        $village_code=$this->request->getData('village_code');
        $vill_cafnpd=$this->FoodSecurities->getDetail($village_code);
        if (!$vill_cafnpd) {
            throw new NotFoundException("No record exist");
        }
        
        $this->set('vill_cafnpd', $vill_cafnpd);
        $this->set('_serialize','vill_cafnpd');
    }

    public function kpi()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Populations');
        $village_code=$this->request->getData('village_code');
        $vill_cafnpd=$this->FoodSecurities->getDetail($village_code);
        if (!$vill_cafnpd) {
            throw new NotFoundException("No record exist");
        }
       // $totpopulation=$this->Populations->getpopulation(1,$village_code);
        $this->set([
            'success' => true,
            'data' => [
                'total_phh_card'=>$vill_cafnpd->total_aay_card + $vill_cafnpd->total_phh_card 
                //'totpopulation'=>$totpopulation->total_population
            ],
            '_serialize' => ['success', 'data']
        ]);
    }

    // protected function getpopulation($agency_id=null,$village_code=null)

    // {
    //     $this->loadModel('Populations');
    //     $pop_subquery= $this->Populations->find()->where(['Populations.village_code'=>$village_code, 'Populations.counting_agency'=>$agency_id]);       
    //     $pop = $this->Populations->find('all')->where(['Populations.reference_year'=> $pop_subquery
    //                     ->select(['latest_ref'=>$pop_subquery->func()->max('Populations.reference_year')]),'Populations.village_code'=>$village_code, 'Populations.counting_agency'=>$agency_id])
    //                     ->first();
    //     return $pop;
    // }
}
