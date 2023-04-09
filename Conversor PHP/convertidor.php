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
<body>
  <main class="container" id="cajap2">
    <form action="covertidos.php" method="post">
    <div>  
    <label for="valor" class="form-control-lg">Ingrese el Valor a Convertir</label>
    <input type="number" name="valor" id="" placeholder="Ingrese el valor" class="form-control-lg">
    </div>
    <br>
    <br>
    <div>
        <select id="select-principal" name="unidad" class="form-control-lg">
            <option value="">Seleccione una la unicad de medida</option>
            <option value="masa">Masa</option>
            <option value="longitud">Longitud</option>
            <option value="datos">Datos</option>
            <option value="moneda">Moneda</option>
            <option value="tiempo">Tiempo</option>
            <option value="volumen">Volumen</option>
         </select>
    
        <select id="unidad_actual" disabled name="unidad_actual" class="form-control-lg">
            <option value="">Seleccione unidad actual</option>
        </select>

        <select id="unidad_a_convertir" disabled name="unidad_a_convertir" class="form-control-lg">
            <option value="">Seleccione unidad a convertir</option>
        </select>
        </div>
        <br>
        <br>
        <div>
        <center><input type="submit" value="Convertir" class="form-control-lg col-md-4 mx-auto"> </center>
        </div>
        <Br>
        
    </form>
    </main>
    <script>
        var selectPrincipal = document.getElementById("select-principal");
        var selectSecundario1 = document.getElementById("unidad_actual");
        var selectSecundario2 = document.getElementById("unidad_a_convertir");

        selectPrincipal.addEventListener("change", function() {
            // Obtener el valor seleccionado en el select principal
            var valorSeleccionado = selectPrincipal.value;

            function mappedSelectsByElement(values) {
                const mappedValues = values.map(value => {
                    const name = value.replaceAll('_', ' ');
                    return `<option value="${value}">${name.charAt(0).toUpperCase()}${name.substring(1)}</option>`;
                })
                const stringItems = mappedValues.join("\n");
                return stringItems;
            }

            function updateSelects(itemValue) {
                selectSecundario1.disabled = false;
                selectSecundario2.disabled = false;
                const mappedMasaUnits = mappedSelectsByElement(itemValue);
                selectSecundario1.innerHTML = `
                <option value="" disabled selected>Seleccione unidad actual</option>
        ${mappedMasaUnits}
      `;
                selectSecundario2.innerHTML = `
                <option value="" disabled selected>Seleccione unidad a convertir</option>
        ${mappedMasaUnits}
      `;
            }
            // Habilitar los otros dos selects y agregar las opciones correspondientes
            const longitudValues = ['centimetro', 'pie', 'yarda', 'metro', 'kilometro', 'milla'];
            const volumeValues = ['metro_cubico', 'litro', 'galon', 'pinta'];
            const masaValues = ['kilogramo', 'gramo', 'libra', 'onza'];
            const datosValues = ['byte', 'kilobyte', 'megabyte', 'gigabyte', 'terabyte'];
            const monedaValues = ['dolar', 'euro', 'libra_esterlina', 'yen', 'quetzal'];
            const tiempoValues = ['segundo', 'minuto', 'hora', 'dia', 'semana', 'mes', 'año'];

            if (valorSeleccionado === "masa") {
                updateSelects(masaValues);
            } else if (valorSeleccionado === "volumen") {
                updateSelects(volumeValues);
            } else if (valorSeleccionado === 'longitud') {
                updateSelects(longitudValues);
            } else if (valorSeleccionado === 'datos') {
                updateSelects(datosValues);
            } else if (valorSeleccionado === 'moneda') {
                updateSelects(monedaValues);
            } else if (valorSeleccionado === 'tiempo') {
                updateSelects(tiempoValues);
            }
        });
    </script>

</body>
<footer class="text-center text-white" style="background-color: #f1f1f1;">
  <div class="container pt-4">
  <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">Grupo 2 - IOM</a>
  </div>
</footer>
</html>