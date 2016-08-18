<?php
//require dirname(__FILE__) . 'user.php';
//require_once('/var/lib/jenkins/workspace/CaseStudyBuildAnt/includes/config.php');
require '/var/lib/jenkins/workspace/CaseStudyBuildAnt/classes/user.php';
class UserTest extends PHPUnit_Framework_TestCase{

	private $testValue;

    public function setUp()
    {
        $this->testValue = new User();
    }
	public function testRegistrationLogin()
    {
        $this->testValue->setGumballs(100);
		$this->testValue->passLength('zx');
		$this->assertEquals(99, $this->testValue->turnWheel(100));
    }
}
?>
