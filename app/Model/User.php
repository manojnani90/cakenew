<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth','AppModel', 'Model');
/**
 * User Model
 *
 * @property Role $Role
 */
class User extends AppModel {
    
    public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
}

public function matchPasswords($data) { 
        if ($data['password'] == $this->data['User']['password_confirmation']) 
            return true; 
        $this->invalidate('password_confirmation', 'your passwords do not match'); 
        return false; 
    } 
     
    public function checkPassword($data) { 
        $user1=new User(); 
        $user=$user1->read(null,  $this->data['User']['id']); 
        $current_password=AuthComponent::password($data['current_password']); 
        if($current_password==$user['User']['password']){ 
        return true; 
     
        } 
        return false; 
 
}
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array(
			'between' => array(
            'rule' => array('between', 6, 15),
            'message' => 'Your username must be 6-15 characters in length'

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
		'password' => array(
			'rule1' => array(
            'rule' => array('between', 6, 15),
            'message' => 'Your password must be 6-15 characters in length'

        ), 
		    'rule2' => array(
            'rule' => 'alphaNumeric',
            'message' => 'Your password must be in only alphabets and numbers',
            'last' => false
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
            
                'Match passwords' => array( 
                'rule' => 'matchPasswords', 
                'message' => 'your passwords do not match' 
                ), 
        
                'password_confirmation' => array( 
                'notBlank' => array( 
                'rule' => 'notBlank', 'message' => 'please confirm your password' 
                ), 
            ),
                'current_password' => array( 
                'notBlank' => array('rule' => 'notBlank', 'message' => 'please enter your old password'), 
                'check password' => array('rule' => 'checkPassword', 
                'message' => 'your password is not correct'), 
                ),
                
                'email' => array(
				 'isUnique' => array(
                    'rule' => 'isUnique',
                    'message' => 'That Email has already been taken',
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
                
		'role_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
