<?php
include ("Color.class.php");
$test = new Color(array('red' => 23, 'green' => 0, 'blue' => 0));
$test2 = new Color(array('red' => 43, 'green' => 0, 'blue' => 0));
$test3 = $test->add( $test2 );
print( $test3     . PHP_EOL );
?>
