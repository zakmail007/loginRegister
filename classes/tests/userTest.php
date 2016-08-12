<?php
//require dirname(__FILE__) . 'user.php';
require_once('/var/lib/jenkins/workspace/CaseStudyBuildAnt/includes/config.php');
//require '/var/lib/jenkins/workspace/CaseStudyBuildAnt/classes/user.php';
class UserTest extends PHPUnit_Framework_TestCase{

	private $testValue;

    public function setUp()
    {
        //$this->testValue = new User();
    }
	public function testRegistrationLogin()
    {
        $user->setGumballs(100);
		$this->assertEquals(99, $user->turnWheel(100));
    }
}
?>
