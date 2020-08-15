<?php

$a ="Ankit";
$b =  base64_encode($a);
$c = base64_decode($b);

echo $a;
echo "<br>";
echo $b;
echo "<br>";
echo $c;
?>