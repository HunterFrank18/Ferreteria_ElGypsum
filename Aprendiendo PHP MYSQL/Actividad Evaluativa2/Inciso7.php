<?php 
$palabra = "SOMETEMOS"; 
$reverso = strrev($palabra);


if (strtolower($palabra) == strtolower($reverso)) {
    echo $palabra . " es un palíndromo.";
} else {
    echo $palabra . " no es un palíndromo.";
}
 ?>