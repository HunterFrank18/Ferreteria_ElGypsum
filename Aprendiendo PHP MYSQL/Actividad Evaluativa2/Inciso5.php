<?php 
$numero1 = 7.5;
$numero2 = 12.3;
$numero3 = 5.8;

// Comparación para encontrar el mayor
if ($numero1 > $numero2 && $numero1 > $numero3) {
    echo "El número mayor es: " . $numero1;
} elseif ($numero2 > $numero1 && $numero2 > $numero3) {
    echo "El número mayor es: " . $numero2;
} else {
    echo "El número mayor es: " . $numero3;
} ?>