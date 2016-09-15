<?php 
require_once 'divisionList.php';

class divisionListTests
{
	public function testAbbreviate()
	{
		$this->assertEquals(abbreviateDivision('advance', 'male', 'adult'), 'AMA');
	}
}


?>