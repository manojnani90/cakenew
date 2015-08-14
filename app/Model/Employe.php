<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent','Controller/Component');
/**
 * Employe Model
 *
 * @property Company $Company
 * @property EmployeStage $EmployeStage
 */
class Employe extends AppModel {
    
    public function importExcel($file) {
		
		App::import('Vendor','aUniqueIdentifier',array('file' => 'PHPExcel'.DS.'IOFactory.php'));
		$objReader = PHPExcel_IOFactory::createReaderForFile($file['tmp_name']);
		$objPHPExcel = $objReader->load($file['tmp_name']);
		$sheet = $objPHPExcel->getActiveSheet();
		$rowIterator = $sheet->getRowIterator();
		$cols = array('A','B','C','D','E','F','G');
		$udata= array();
		$return = array('messages' => array(),
						'errors' => array());
					
		foreach($rowIterator as $row) {
			
			foreach($cols as $k=>$val) {
				if($row->getRowIndex()>=2) {
					$udata['Employe'][$sheet->getCell($val. 1)->getValue()]=(string)$sheet->getCell($val. $row->getRowIndex())->getValue();	
				}
			}
			
			
			
			$this->create();
			
			//validate the row
			$this->set($udata);
			
			if(!$this->validates() && $row->getRowIndex()>=2) {
				$return['errors'][] .= $row->getRowIndex();
			}
			
			//success message
			if($row->getRowIndex()>=2 && $this->save($udata)) {
		         $return['messages'][] .= $row->getRowIndex(); 
			}
		}
		/*debug($return);
				exit;*/
		return $return;
    }

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'employeid' => array(		   
		   'isUnique' => array(
                    'rule' => 'isUnique',
                    'message' => 'That Employeid has already been taken',
                    'on' => 'create'
                ),
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'employe_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'company_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'cardid' => array(
                    'isUnique' => array(
                    'rule' => 'isUnique',
                    'message' => 'That Employeid has already been taken',
                    'on' => 'create'
                ),
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'EmployeStage' => array(
			'className' => 'EmployeStage',
			'foreignKey' => 'employe_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}            


