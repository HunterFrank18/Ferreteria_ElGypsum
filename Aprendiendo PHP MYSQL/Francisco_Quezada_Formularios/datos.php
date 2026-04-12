<?php
    if($_SERVER["REQUEST_METHOD"]="post"){
        echo $_POST['nombre']."<br>";
        echo $_POST['apellido']."<br>";
        $salario = isset($_POST['salario']) ? $_POST['salario'] : 0;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_POST = array();
    }
    if ($salario == 1800) {
        $bono = 100;
    } elseif ($salario == 1500) {
        $bono = 60;
    } elseif ($salario == 1000) {
        $bono = 50;
    } else {
        $bono = 0; 
    }

    $salarioFinal = $salario + $bono;

   
    echo "Su bono es de $" . $bono . " y su salario final es de $" . $salarioFinal;
    ?>