<?php


include 'func.php';

writeHello();

writeMsg('hello');
writeMsg('byebye');

writeMsgTo('Ingrid','Functions are cool');
writeMsgTo('Ingrid');

$outcome = addValue(5,7);
echo 'The outcome of 5 + 7 = '. $outcome . '<br/>';

$outcome = calcRect(5, 7);
echo 'The area of a rectangle of 5 and 7 = '. $outcome . '<br/>';

?>