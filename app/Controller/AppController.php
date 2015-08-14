<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'users',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        )
    );
public $uses= array('EmployeStage','Employe');    
 
 public function beforeFilter() {    
        $this->Auth->allow('index','add','view');		
		
		$this->EmployeStage->recursive = -1;
		$employeStages1 = $this->EmployeStage->find('all',array('conditions'=>array('NOT' => array('EmployeStage.stage' =>'')),
		'fields' => array('DISTINCT EmployeStage.stage')));
 		
		$empid1 = $this->EmployeStage->find('all',array('fields' => array('DISTINCT EmployeStage.employeid')));		
		$this->set(compact('employeStages1','empid1','companynames'));
		
		$this->Employe->recursive = -1;
		$companynames = $this->Employe->find('all',array('fields' => array('DISTINCT Employe.company_name')));						
		$this->set('companynames',$companynames);		
    }   
}
