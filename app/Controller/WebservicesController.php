<?php
App::uses('AppController', 'Controller');
/**
 * Webservices Controller
 *
 * @property Webservice $Webservice
 * @property PaginatorComponent $Paginator
 */
class WebservicesController extends AppController {

/**
 * Components
 *
 * @var array
 */
		
		public $components = array('RequestHandler');
        public $uses = array('Employe','EmployeStage');
        
        public function beforeFilter() {
        parent::beforeFilter();
	
        $this->Auth->allow('employe_list','getEmployeStages','getEmployeOfflineStages');         
        }   
        
        public function employe_list(){	
        $this->autoRender = false;
            $this->Employe->recursive = -1;
            $employes=$this->Employe->find('all');
            $options = array();	
            $i = 0;
            foreach($employes as $employe){
		
		//$options['Employe'][$i]['id'] = $employe['Employe']['id'];
		$options['Employe'][$i]['employeid'] = $employe['Employe']['employeid'];
                $options['Employe'][$i]['employe_name'] = $employe['Employe']['employe_name'];
		$options['Employe'][$i]['company_name'] = $employe['Employe']['company_name'];
                $options['Employe'][$i]['cardid'] = $employe['Employe']['cardid'];
		$i++;
	}
	
	echo json_encode($options);
	
	exit;
	
}  
        public function getEmployeStages($empid,$date,$latitude,$longitude,$status){ 
        $this->autoRender = false;
        
            $y= substr($date, 0,4); 
            $m= substr($date, 4,2);
            $d= substr($date, 6,2);
            $h= substr($date, 9,2);
            $mn= substr($date, 11,2);
            $s= substr($date, 13,2);
            $dt=$y.'-'.$m.'-'.$d.' '.$h.'-'.$mn.'-'.$s;           
           
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false';
            $json = @file_get_contents($url);
            $data=json_decode($json);
            
            /*$status1 = $data->status;           
            if($status1=="OK"){
            $stage = $data->results[0]->formatted_address;
            
            }else
            {return false;
            }*/
            if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \InvalidArgumentException('Invalid geocoding results');
          }
            if(isset($data->results[0])) {
            foreach($data->results[0]->address_components as $addressComponent) {
            if(in_array('route', $addressComponent->types)) {
                $stage = $addressComponent->long_name;               
            }
           }
          }
           
            $emp_id=$this->Employe->find('first',array('conditions'=>array('Employe.employeid'=>$empid),'fields'=>array('id')));           
            
            $employestage['EmployeStage']['stage']=$stage;
            $employestage['EmployeStage']['employe_id']=$emp_id['Employe']['id'];
            $employestage['EmployeStage']['employeid']=$empid;
            $employestage['EmployeStage']['latitude']=$latitude;
            $employestage['EmployeStage']['longitude']=$longitude;
            $employestage['EmployeStage']['date']=$dt;
            $employestage['EmployeStage']['status']=$status;
            /*debug($employestage);
            exit;*/
            $this->EmployeStage->create();
            if($this->EmployeStage->save($employestage)){               
                echo json_encode(array('errcode' => '0','msg' => 'success'));
             }else{
                echo json_encode(array('errcode' => '1','msg' => 'failure'));
             }
           }
                    
           public function getEmployeOfflineStages() {
            $this->autoRender = false;
            
         /*$this->request->employes = '[{"empid":"0445fe12814380","longitude":"0.00","latitude":"0.00","date":"20150806_163024","status":"Entry"},
		    {"empid":"0445fe12814380","longitude":"78.4702213","latitude":"17.40062","date":"20150806_163024","status":"Entry"},
			{"empid":"0445fe12814380","longitude":"0.00","latitude":"0.00","date":"20150806_163024","status":"Entry"},
			{"empid":"0445fe12814380","longitude":"0.00","latitude":"0.00","date":"20150806_163024","status":"Entry"}]';*/
		 //$this->request->employes = '[{"empid":"0445fe12814380","longitude":"0.00","latitude":"0.00","date":"20150729_163024","status":"Entry"}]';
           
              if ($this->request->is('post')) {
                $employes1 = json_decode($this->request->data['employes'], true);
                
                foreach ($employes1 as $employe){   
					$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($employe['latitude']).','.trim($employe['longitude']).'&sensor=false';
					$json = @file_get_contents($url);
					$data=json_decode($json);
					   /*debug($data->results[0]->address_components[1]);
			exit;       */
							   
					$status1 = $data->status;
					     
					/*if($status1=="OK"){
					$stage = $data->results[0]->formatted_address;					
					}else
					{
					 $stage='null';
					}*/
           if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \InvalidArgumentException('Invalid geocoding results');
          }
		  
		  	$stage = '';
            if(isset($data->results[0])) {
            foreach($data->results[0]->address_components as $addressComponent) {
            if(in_array('route', $addressComponent->types)) {
                $stage = $addressComponent->long_name;               
            }
           }
          }
          /*}*/
                    $y= substr($employe['date'], 0,4); 
                    $m= substr($employe['date'], 4,2);
                    $d= substr($employe['date'], 6,2);
                    $h= substr($employe['date'], 9,2);
                    $mn=substr($employe['date'], 11,2);
                    $s= substr($employe['date'], 13,2);
                    $dt=$y.'-'.$m.'-'.$d.' '.$h.'-'.$mn.'-'.$s; 
                    
            $emp_id=$this->Employe->find('first',array('conditions'=>array('Employe.cardid'=>$employe['empid']),'fields'=>array('id','employeid')));
           
             
			
            $employestage['EmployeStage']['stage']= $stage;
            $employestage['EmployeStage']['employe_id']=$emp_id['Employe']['id'];
            $employestage['EmployeStage']['employeid']=$emp_id['Employe']['employeid'];
            $employestage['EmployeStage']['latitude']=$employe['latitude'];
            $employestage['EmployeStage']['longitude']=$employe['longitude'];
            $employestage['EmployeStage']['date']=$dt;
            $employestage['EmployeStage']['status']=$employe['status'];
          
		  
               $this->EmployeStage->create();
                if($this->EmployeStage->save($employestage)){               
                    echo json_encode(array('errcode' => '0','msg' => 'success'));
                 }else{
                    echo json_encode(array('errcode' => '1','msg' => 'failure'));
             }
            }
          }     
         }
      
}
