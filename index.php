
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
        <form method="POST" action="./data.php" >
            <nav>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                        </div>
                        <div class="col">
                            <label for="">Campuslands</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Apellidos" name="apellido">
                        </div>
                        <div class="col">
                            <input type="number" placeholder="Edad" name="edad">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="direccion" placeholder="Direccion">
                        </div>
                        <div class="col">
                            <input type="email" name="email" placeholder="Correo Electronico">
                        </div>
                    </div>
                </div>
            </nav>
            <main>
                <div class="row">
                    <div class="col">
                        <label for="">Hora de entrada</label><br>
                        <input type="time" name="hora" id="">
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
                        <input type="text" placeholder="Team" name="team" id="">
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
                        <input type="text" name="trainer" placeholder="Trainer" id="">
                    </div>
                    <div class="col">
                        <input type="text" name="cedula" placeholder="Cédula" id="">
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
                        <tr>
                            <td>Pepito</td>
                            <td>Lopez</td>
                            <td>asdas</td>
                            <td>21</td>
                            <td>jer@gmail.com</td>
                            <td>2:50</td>
                            <td>Sputnik</td>
                            <td>Miguel</td>
                        </tr>
                    </tbody>
                </table>
            </footer>
        </form>
    </div>
</body>

</html>