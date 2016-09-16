<?php 
require_once 'divisionFunctions.php';

class divisionListTests
{
	public function testAbbreviate()
	{
		$this->assertEquals(abbreviateDivision('advance', 'male', 'adult'), 'AMA');
	}
}


?>