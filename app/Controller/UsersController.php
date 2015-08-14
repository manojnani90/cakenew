<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
public $components = array('Paginator');
     
    public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('admin_login','admin_add','admin_forgetpwd','admin_reset','admin_change_password','saveField','admin_reports'); 
}

/* login */
 
   public function admin_login() {
	$this->layout='login';
        Configure::write('debug', 0);
    if ($this->request->is('post')) {        
        if($this->Auth->login()) {           
       		return $this->redirect(array('controller'=>'EmployeStages','action'=>'reports'));
        }
        $this->Session->setFlash(__('Invalid username or password, try again'));
    }
}

/* logout */
public function admin_logout() {
	$this->layout='login';
	$this->Auth->logout();
	return $this->redirect(array('action' => 'login'));
}

/* change password */
function admin_change_password() {
    if (!empty($this->data)) {
        if ($this->User->save($this->data)) {
            $this->Session->setFlash('Your Password Has been Updated Please Login');
            $this->redirect(array('controller'=>'users','action'=>'logout'));
        } 
		else {
            $this->Session->setFlash('Password could not be changed.');
        }
    } else {
        $this->data = $this->User->findById($this->Auth->user('id'));
    }
}

/* forget password */
function admin_forgetpwd(){
    $this->layout='login';
        $this->User->recursive=-1;
        if(!empty($this->data))
        {
            if(empty($this->data['User']['email']))
            {
                $this->Session->setFlash('Please Provide Your Email Adress that You used to Register with Us');
            }
            else
            {
                $email=$this->data['User']['email'];
                $fu=$this->User->find('first',array('conditions'=>array('User.email'=>$email)));
				
                if($fu)
                {
                    if($fu['User']['email'])
                    {
                        $key = Security::hash(microtime(),'sha512',true);						
                        $hash=sha1($fu['User']['username'].rand(0,100));
                        $url = Router::url( array('controller'=>'users','action'=>'reset'), true ).'/'.$key.'#'.$hash;
                        $ms=$url;
                        $ms=wordwrap($ms,50);
                        $fu['User']['tokenhash']=$key;
                        $this->User->id=$fu['User']['id'];
                        if($this->User->saveField('tokenhash',$fu['User']['tokenhash'])){
                            /*E-mail*/	
                     	$email = new CakeEmail();
       					$email->from(array('kcreddy@etisbew.com' => 'SSHUTTLE'));
						$email->to($this->request->data['User']['email']);
						$email->subject('Check Your Email To Reset your password');
						$email->emailFormat('html');
						$email->send($ms);
                        $this->Session->setFlash('Check Your Email To Reset your password');
                            /*EndEmail*/
                        }
                        else{
                            $this->Session->setFlash("Error Generating Reset link");
                        }
                    }
                    else
                    {
                        $this->Session->setFlash('This Account is not Active yet.Check Your mail to activate it');
                    }
                }
                else
                {
                    $this->Session->setFlash('Email does Not Exist');
                }
            }
        }
    }
/* reset */    
function admin_reset($token=null){
		$this->layout='login';
        $this->User->recursive=-1;
        if(!empty($token)){
            $u=$this->User->findBytokenhash($token);
            if($u){
                $this->User->id=$u['User']['id'];
                if(!empty($this->data)){
                    $this->User->data=$this->data;
                    $this->User->data['User']['username']=$u['User']['username'];
                    $new_hash=sha1($u['User']['username'].rand(0,100));//created token
                    $this->User->data['User']['tokenhash']=$new_hash;
                    if($this->User->validates(array('fieldList'=>array('password','password_confirm')))){
                        if($this->User->save($this->User->data))
                        {
                            $this->Session->setFlash('Password has been updated.Please login');
                            $this->redirect(array('controller'=>'Users','action'=>'login'));
                        }
                    }
                    else{
                        $this->set('errors',$this->User->invalidFields());
                    }
                }
            }
            else
            {
                 $this->Session->setFlash('Token corrupted,please retry.The reset link work only for once.');
           }
        }
    }

public function admin_dashboard() {

}

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
               
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$roles = $this->User->Role->find('list',array('fields'=>array('id','role')));
		$this->set(compact('roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$roles = $this->User->Role->find('list',array('fields'=>array('id','role')));
		$this->set(compact('roles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
