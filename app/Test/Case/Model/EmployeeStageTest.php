<?php
App::uses('EmployeeStage', 'Model');

/**
 * EmployeeStage Test Case
 *
 */
class EmployeeStageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.employee_stage',
		'app.employee',
		'app.company'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmployeeStage = ClassRegistry::init('EmployeeStage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmployeeStage);

		parent::tearDown();
	}

}
