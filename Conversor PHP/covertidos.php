<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./JS/Menu-desplegable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="diseño.css">
    <title>Document</title>
</head>
<header>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">KODIGO - OIM GRUPO 2 </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Equipo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto</a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>
<br>
<div class="container">
<div class="container" >
        <p>
      <center><h3>Conversor de Unidades</h3> </center>
      <br>
    <p>Este es un conversor de diferentes tipos de unidades, solo debes ingresar el parametro que deseas convertir y luego seleccionar a que 
      tipo de medida pertenece y por ultimo a cual lo deseas convertir.
      <br>
      Al final le das click al boton Convertir y te mostrara el resultado.
    </p>
      </div>
</div>
<br>
<div id="cajap">
<?php

class ConversorUnidades {
    private $factores;
  // medidas   
    public function __construct() {
        $this->factores = array(
            "longitud" => array(
                "metro" => 1,
                "centimetro" => 100,
                "pulgada" => 39.3701,
                "pie" => 0.3048,
                "yarda" => 0.9144,
                "milla" => 1609.344,
                "kilometro" => 1000,
                "milimetro" => 0.001,
            ),
            "masa" => array(
                "kilogramo" => 1,
                "gramo" => 0.001,
                "libra" => 0.453592,
                "onzas" => 0.0283495,
            ),
            "volumen" => array(
                "metro_cubico" => 1,
                "litro" => 0.001,
                "galon" => 0.00378541,
                "pinta" => 0.000473176,
            ),
            "datos" => array(
                "byte" => 1,
                "kilobyte" => 1024,
                "megabyte" => 1048576,
                "gigabyte" => 1073741824,
                "terabyte" => 1099511627776
            ),
            "moneda" => array(
                "dolar" => 1,
                "euro" => 1.18288,
                "libra_esterlina" => 1.38649,
                "yen" => 0.00907292,
                "quetzal" => 0.1282
            ),
            "tiempo" => array(
                "segundo" => 1,
                "minuto" => 60,
                "hora" => 3600,
                "dia" => 86400,
                "semana" => 604800,
                "mes" => 2628000,
                "año" => 31536000,
            )
        );
    }
    
    public function convertirUnidades($cantidad, $unidad_actual, $unidad_a_convertir, $unidad) {
        // Comprobar que las unidades son válidas
        if (!array_key_exists($unidad_actual, $this->factores[$unidad]) || !array_key_exists($unidad_a_convertir, $this->factores[$unidad])) {
            return "Unidades no válidas";
        }

        // Realizar la conversión
        $resultado = $cantidad * $this->factores[$unidad][$unidad_a_convertir];
        return number_format($resultado, 2); // Mostrar el resultado con dos decimales
    }


    
   public function mostrarTabla($cantidad, $de, $unidad_a_convertir, $resultado) {
        echo "<table id= 'tabla1'>";
        echo "<tr class='container'><th colspan='2'><h3>Resultados</h3></th></tr>";
        echo "<tr><td>$cantidad $de <b> Es igual a:</b>  </td> <td> $resultado $unidad_a_convertir</td></tr>";
        echo "</table>";
    }
}

$valor= $_REQUEST["valor"];
$unidad_actual= $_REQUEST["unidad_actual"];
$unidad_a_convertir= $_REQUEST["unidad_a_convertir"];
$unidad=$_REQUEST["unidad"];

$unidades= new ConversorUnidades();
$resultado=$unidades->convertirUnidades($valor, $unidad_actual,$unidad_a_convertir,$unidad);
$unidades->mostrarTabla($valor, $unidad_actual,$unidad_a_convertir,$resultado);


?>
<br>
<br>
<button id="Letra" type="button" class=" text bton btn btn-outline-dark"> <a href="convertidor.php"> Volver</a></button>
</div>
<br>
<br>
<br>
<footer class="text-center text-white" style="background-color: #f1f1f1;">
  <div class="container pt-4">
  <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">Grupo 2 - IOM</a>
  </div>
</footer>