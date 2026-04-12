<?php 
$sueldo = 900;

if ($sueldo < 1000) {
    
    $aumento = $sueldo * 0.20;
} elseif ($sueldo >= 1000 && $sueldo <= 1500) {
   
    $aumento = $sueldo * 0.15;
} else {
   
    $aumento = 0;
}


$salarioFinal = $sueldo + $aumento;

echo "Sueldo inicial: C$" . $sueldo . "<br>";
echo "Aumento: C$" . $aumento . "<br>";
echo "Salario final ya con su aumento: C$" . $salarioFinal . "<br>";
 ?>