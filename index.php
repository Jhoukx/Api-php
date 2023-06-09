<?php
// error_reporting(0); 
// ini_set('display_errors', 0);
function validarValores ($array){
    foreach ($array as $valor) {
        if (empty($valor)) {
            return false;
        }
    }
    return true;
}
$url = "https://64828fa7f2e76ae1b95b4d7f.mockapi.io/usuarios";
if(!empty($_POST)){
        $nombre = "";
        $apellido = "";
        $edad = "";
        $direccion = "";
        $email = "";
        $entrada = "";
        $team = "";
        $trainer = "";
        $cedula = "";
        if ($_POST['guardar'] === '✅') {
            // *METODO POST
            $valores = [
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "edad" => $_POST["edad"],
                "direccion" => $_POST["direccion"],
                "correoElectronico" => $_POST["email"],
                "horaDeEntrada" => $_POST["hora"],
                "team" => $_POST["team"],
                "trainer" => $_POST["trainer"],
                "cedula" => $_POST["cedula"]
            ];
            // Validar valores
            if(validarValores($valores)){
                $credenciales["http"]["header"] = "Content-type: application/json";
                $credenciales["http"]["method"] = "POST";
                $data = json_encode($valores);
                $credenciales["http"]["content"] = $data;
                $config = stream_context_create($credenciales);
                $_DATAPOST = file_get_contents($url, false, $config);
            }else{
                echo "<h1>Envie TODOS los datos 😠🖕</h1>";
            }
        }elseif($_POST['eliminar'] === '❌'){
            $credenciales["http"]["header"] = "Content-type: application/json";
            $credenciales["http"]["method"] = "DELETE";
            
            $urlDELETE = $url . "/" . $_POST["id"];
            $config = stream_context_create($credenciales);
            $_DATADELETE = file_get_contents($urlDELETE, false, $config);
            
        }elseif($_POST['actualizar'] === '✏️'){
            // *METODO PUT
            $valoresActualizados = [
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "edad" => $_POST["edad"],
                "direccion" => $_POST["direccion"],
                "correoElectronico" => $_POST["email"],
                "horaDeEntrada" => $_POST["hora"],
                "team" => $_POST["team"],
                "trainer" => $_POST["trainer"],
                "cedula" => $_POST["cedula"]
            ];

            $data = json_encode($valoresActualizados);
            $credenciales["http"]["header"] = "Content-type: application/json";
            $credenciales["http"]["method"] = "PUT";
            $credenciales["http"]["content"] = $data;
            
            $urlPUT = $url . "/" . $_POST["id"];
            $config = stream_context_create($credenciales);
            $_DATAPUT= file_get_contents($urlPUT,false,$config);

            echo "*c actualizan los datos*";
        }elseif($_POST['buscar'] === '🔎'){
            // *METODO GET
            $_DATAGET = file_get_contents($url ."?cedula=". $_POST["cedula"]);  
            $data = json_decode($_DATAGET,true);
            $nombre = $data[0]['nombre'];
            $apellido = $data[0]['apellido'];
            $edad = $data[0]['edad'];
            $direccion = $data[0]['direccion'];
            $email = $data[0]['correoElectronico'];
            $entrada = $data[0]['horaDeEntrada'];
            $team = $data[0]['team'];
            $trainer = $data[0]['trainer'];
            $cedula = $data[0]['cedula'];
            $id = $data[0]["id"];
        }elseif (!empty($_POST["cargar"])) {
            //Valores a inputs
            $_DATAGET = file_get_contents($url ."?cedula=". $_POST["cargar"]);  
            echo "<h1>URL</h1>";
            echo $url ."?cedula=". $_POST["cedula"];
            $data = json_decode($_DATAGET,true);
            $nombre = $data[0]['nombre'];
            $apellido = $data[0]['apellido'];
            $edad = $data[0]['edad'];
            $direccion = $data[0]['direccion'];
            $email = $data[0]['correoElectronico'];
            $entrada = $data[0]['horaDeEntrada'];
            $team = $data[0]['team'];
            $trainer = $data[0]['trainer'];
            $cedula = $data[0]['cedula'];
            $id = $data[0]["id"];
        }
    }else{
    echo "Por favor, ingrese datos";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API-PHP</title>
    <link rel="stylesheet" href="./css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./css/index.css">
    
</head>

<body>
    <div class="container">
        <form method="POST" action="">
            <nav>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo isset($nombre)?$nombre:""?>">
                        </div>
                        <div class="col">
                            <label for="">Campuslands</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Apellidos" name="apellido" value="<?php echo isset($apellido)?$apellido:""?>">
                        </div>
                        <div class="col">
                            <input type="number" placeholder="Edad" name="edad" value="<?php echo isset($edad)?$edad:""?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="direccion" placeholder="Direccion" value="<?php echo isset($direccion)?$direccion:""?>">
                        </div>
                        <div class="col">
                            <input type="email" name="email" placeholder="Correo Electronico" value="<?php echo isset($email)?$email:""?>">
                        </div>
                    </div>
                </div>
            </nav>
            <main>
                <div class="row">
                    <div class="col">
                        <label for="">Hora de entrada</label><br>
                        <input type="time" name="hora" id="" value="<?php echo isset($entrada)?$entrada:""?>">
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <input class="crud" type="submit" name="guardar" value="✅">
                            </div>
                            <div class="col">
                                <input class="crud" type="submit" name="eliminar" value="❌">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" placeholder="Team" name="team" id="" value="<?php echo isset($team)?$team:""?>">
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <input class="crud" name="actualizar" type="submit" value="✏️">
                            </div>
                            <div class="col">
                                <input class="crud" name="buscar" type="submit" value="🔎">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="trainer" placeholder="Trainer" id="" value="<?php echo isset($trainer)?$trainer:""?>">
                    </div>
                    <div class="col">
                        <input type="text" name="cedula" placeholder="Cédula" id="" value="<?php echo isset($cedula)?$cedula:""?>">
                        <input type="text" name="id" placeholder="id" id="" value="<?php echo isset($id)?$id:""?>" hidden>
                    </div>
                </div>
            </main>
            <footer>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Direccion</th>
                            <th>Edad</th>
                            <th>Email</th>
                            <th>Entrada</th>
                            <th>Team</th>
                            <th>Trainer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resGet = file_get_contents($url);
                        $datosGet = json_decode($resGet,true);
                        if(!empty($datosGet)){
                            foreach($datosGet as $dato){
                                echo "<tr>";
                                echo "<td>".$dato["nombre"]."</td>";
                                echo "<td>".$dato["apellido"]."</td>";
                                echo "<td>".$dato["direccion"]."</td>";
                                echo "<td>".$dato["edad"]."</td>";
                                echo "<td>".$dato["correoElectronico"]."</td>";
                                echo "<td>".$dato["horaDeEntrada"]."</td>";
                                echo "<td>".$dato["team"]."</td>";
                                echo "<td>".$dato["trainer"]."</td>";
                                echo "<td ><button type='submit' name='cargar' value='".$dato["cedula"]."'>⬆️</button></td>";
                                echo "<td hidden>".$dato["id"]."</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </footer>
        </form>
    </div>
</body>

</html>