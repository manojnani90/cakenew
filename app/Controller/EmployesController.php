<?php
App::uses('AppController', 'Controller');
/**
 * Employes Controller
 *
 * @property Employe $Employe
 * @property PaginatorComponent $Paginator
 */
class EmployesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','PhpExcel');
  
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Employe->recursive = 0;
		$this->set('employes', $this->Paginator->paginate());
	}
        
        public function admin_usersupload() {
		if($this->request->is('post','put')) {
					
			if(!empty($_FILES['Employes']['name'])) {
				
				if(in_array(pathinfo($_FILES['Employes']['name'],PATHINFO_EXTENSION),array('csv')))  {
						$message = $this->Employe->importCSV($_FILES['Employes']);	
						if(!empty($message)) {
							$scount = sizeof($message['messages']);	
						} 
						$this->Session->setFlash($scount .'&nbsp;&nbsp;Number of records updated <br/>'.
						implode(',',$message['errors']). '&nbsp;&nbsp; Rows failed');
				} else if(in_array(pathinfo($_FILES['Employes']['name'],PATHINFO_EXTENSION),array('xls','xlsx'))){
					
					$message = $this->Employe->importExcel($_FILES['Employes']);
						if(!empty($message)) {
							$scount = sizeof($message['messages']);	
						} 
						
						$this->Session->setFlash($scount .'&nbsp;&nbsp;Number of records updated <br/>'.
						implode(',',$message['errors']). '&nbsp;&nbsp; Rows failed');
				} else {
					$this->Session->setFlash(__('Please upload csv or excel file'));	
				}
				
			} else {
				$this->Session->setFlash(__('Please upload valid file'));	
			}
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Employe->exists($id)) {
			throw new NotFoundException(__('Invalid employe'));
		}
		$options = array('conditions' => array('Employe.' . $this->Employe->primaryKey => $id));
		$this->set('employe', $this->Employe->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Employe->create();                      
			if ($this->Employe->save($this->request->data)) {
				$this->Session->setFlash(__('The employe has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employe could not be saved. Please, try again.'));
			}
		}
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Employe->exists($id)) {
			throw new NotFoundException(__('Invalid employe'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Employe->save($this->request->data)) {
				$this->Session->setFlash(__('The employe has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employe could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Employe.' . $this->Employe->primaryKey => $id));
			$this->request->data = $this->Employe->find('first', $options);
		}
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Employe->id = $id;
		if (!$this->Employe->exists()) {
			throw new NotFoundException(__('Invalid employe'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Employe->delete()) {
			$this->Session->setFlash(__('The employe has been deleted.'));
		} else {
			$this->Session->setFlash(__('The employe could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
