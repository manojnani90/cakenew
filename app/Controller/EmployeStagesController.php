<?php
App::uses('AppController', 'Controller');
/**
 * EmployeStages Controller
 *
 * @property EmployeStage $EmployeStage
 * @property PaginatorComponent $Paginator
 */
class EmployeStagesController extends AppController {
    
    private $exportemployestages = null;

/**
 * Components
 *
 * @var array
 */     
 	
	var $helpers = array('Html', 'Form');
	public $components = array('Paginator','PhpExcel');
        
        
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->EmployeStage->recursive = 0;		
		$this->set('employeStages', $this->Paginator->paginate());
	}
        
        public function admin_downloads() {
                $this->layout='reports';
				
				$this->request->data = $this->request->query;
				
                $estage = isset($this->request->data['estage']) ? $this->request->data['estage'] : '';
				$empid = isset($this->request->data['empid']) ? $this->request->data['empid'] : '';
				$companyname = isset($this->request->data['companyname']) ? $this->request->data['companyname'] : '';
				
                $startdate = isset($this->request->data['startdate']) ? $this->request->data['startdate'] : '';                
                $starthours = isset($this->request->data['starthours']) ? substr($this->request->data['starthours'], 0,2) : 0;
				$startminutes = isset($this->request->data['startminutes']) ? $this->request->data['startminutes'] : '';
				$startseconds = isset($this->request->data['startseconds']) ? $this->request->data['startseconds'] : '';
				
				$enddate = isset($this->request->data['enddate']) ? $this->request->data['enddate'] : '';
				$endhours = isset($this->request->data['endhours']) ? substr($this->request->data['endhours'], 0,2) : 0;
				$endminutes = isset($this->request->data['endminutes']) ? $this->request->data['endminutes'] : '';
				$endseconds = isset($this->request->data['endseconds']) ? $this->request->data['endseconds'] : '';
				
				$timearray = array();
				$conditions = array();
				if(!empty($startdate)){
					$start_time =  date("Y-m-d", strtotime($startdate));
					$start_time = $start_time.' '.$starthours.':'.$startminutes.':'.$startseconds;
					$timearray[] = $start_time; 
				}
				if(!empty($enddate)) {
					$end_time = date("Y-m-d", strtotime($enddate));
					$end_time = $end_time.' '.$endhours.':'.$endminutes.':'.$endseconds;  
					$timearray[] = $end_time;
				}				
			
               	if(!empty($estage)){
	
					$conditions[] = array("EmployeStage.stage"=>$estage); 			
			   }
			   if(!empty($empid)){
					$conditions[] = array("EmployeStage.employeid"=>$empid); 			
			   }
			   if(!empty($companyname)){			 
					$conditions[] = array("Employe.company_name"=>$companyname); 			
			   }
			   if(!empty($timearray)) {			   
					if(count($timearray)==2){
						$conditions[] = array('EmployeStage.date BETWEEN ? and ?' => $timearray);
					}else{
						$conditions[] = array('date(EmployeStage.date)' => date("Y-m-d",strtotime($timearray[0])));
					}
											 
			   }
							
				//$this->paginate = array('conditions' =>$conditions,'order' => array('EmployeStage.date' => 'DESC',));
				$this->paginate =array('conditions' =>$conditions,
                 'limit' => 50000000,
				 'order' => array('EmployeStage.date' => 'DESC'),
             );
				$this->EmployeStage->recursive = 1;
				$exportemployestages = $this->paginate('EmployeStage');
                
				$this->set('employeStages',$exportemployestages);
         
	}
        
        public function admin_reports() {
            
                $this->layout='reports';
               
				$this->request->data=$this->request->query;
                //$data = $this->request->data;
				$estage = isset($this->request->data['estage']) ? $this->request->data['estage'] : '';
				$empid = isset($this->request->data['empid']) ? $this->request->data['empid'] : '';
				$companyname = isset($this->request->data['companyname']) ? $this->request->data['companyname'] : '';
				
                $startdate = isset($this->request->data['startdate']) ? $this->request->data['startdate'] : '';                
                $starthours = isset($this->request->data['starthours']) ? substr($this->request->data['starthours'], 0,2) : 0;
				$startminutes = isset($this->request->data['startminutes']) ? $this->request->data['startminutes'] : '';
				$startseconds = isset($this->request->data['startseconds']) ? $this->request->data['startseconds'] : '';
				
				$enddate = isset($this->request->data['enddate']) ? $this->request->data['enddate'] : '';
				$endhours = isset($this->request->data['endhours']) ? substr($this->request->data['endhours'], 0,2) : 0;
				$endminutes = isset($this->request->data['endminutes']) ? $this->request->data['endminutes'] : '';
				$endseconds = isset($this->request->data['endseconds']) ? $this->request->data['endseconds'] : '';
								
				$timearray = array();
				$conditions = array();
				if(!empty($startdate)){
					$start_time =  date("Y-m-d", strtotime($startdate));
					$start_time = $start_time.' '.$starthours.':'.$startminutes.':'.$startseconds;
					$timearray[] = $start_time; 
				}
				if(!empty($enddate)) {
					$end_time = date("Y-m-d", strtotime($enddate));
					$end_time = $end_time.' '.$endhours.':'.$endminutes.':'.$endseconds;  
					$timearray[] = $end_time;
				}				
				/*$p_stage='';
				$p_date='';*/
               	if(!empty($estage)){
			   		//$p_stage = "'EmployeStage.stage' =>'$estage'".",";	
					$conditions[] = array("EmployeStage.stage"=>$estage); 			
			   }
			   if(!empty($empid)){
			   		//$p_stage = "'EmployeStage.stage' =>'$estage'".",";	
					$conditions[] = array("EmployeStage.employeid"=>$empid); 			
			   }
			   if(!empty($companyname)){
			   		//$p_stage = "'EmployeStage.stage' =>'$estage'".",";	
					$conditions[] = array("Employe.company_name"=>$companyname); 			
			   }
			   if(!empty($timearray)) {
			   		//$p_date = '(EmployeStage.date BETWEEN "'.$start_time.'" AND "'.$end_time.'")';
					if(count($timearray)==2){
						$conditions[] = array('EmployeStage.date BETWEEN ? and ?' => $timearray);
					}else{
						$conditions[] = array('date(EmployeStage.date)' => date("Y-m-d",strtotime($timearray[0])));
					}
											 
			   }
				
				//$this->Paginator->settings = array('conditions' =>array('AND'=>array($p_stage.$p_date)));			
				
				$this->paginate =array('conditions' =>$conditions,'order' => array('EmployeStage.date' => 'DESC'));
				$this->EmployeStage->recursive = 1;
				$exportemployestages = $this->Paginator->paginate('EmployeStage');
                
				$this->set('employeStages',$exportemployestages);
                
                
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->EmployeStage->exists($id)) {
			throw new NotFoundException(__('Invalid employe stage'));
		}
		$options = array('conditions' => array('EmployeStage.' . $this->EmployeStage->primaryKey => $id));
                
		$this->set('employeStage', $this->EmployeStage->find('first', $options));
                
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
                   
			$this->EmployeStage->create();
			if ($this->EmployeStage->save($this->request->data)) {
				$this->Session->setFlash(__('The employe stage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employe stage could not be saved. Please, try again.'));
			}
		}
		$employes = $this->EmployeStage->Employe->find('list',array('fields'=>array('id','employeid')));
                
		$this->set(compact('employes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->EmployeStage->exists($id)) {
			throw new NotFoundException(__('Invalid employe stage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EmployeStage->save($this->request->data)) {
				$this->Session->setFlash(__('The employe stage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employe stage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EmployeStage.' . $this->EmployeStage->primaryKey => $id));
			$this->request->data = $this->EmployeStage->find('first', $options);
		}
		$employes = $this->EmployeStage->Employe->find('list',array('fields'=>array('id','employeid')));
                
		$this->set(compact('employes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->EmployeStage->id = $id;
		if (!$this->EmployeStage->exists()) {
			throw new NotFoundException(__('Invalid employe stage'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EmployeStage->delete()) {
			$this->Session->setFlash(__('The employe stage has been deleted.'));
		} else {
			$this->Session->setFlash(__('The employe stage could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
