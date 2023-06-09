<?php
  $credenciales["http"]["method"] = "POST";
  $credenciales["http"]["header"] = "Content-type: application/json";
  $data = [
      "nombre"=>$_POST["nombre"],
      "apellido"=> $_POST["apellido"],
      "edad"=> $_POST["edad"],
      "direccion"=>$_POST["direccion"],
      "correoElectronico"=>$_POST["email"],
      "HoraDeEntrada"=>$_POST["hora"],
      "Team"=>$_POST["team"],
      "Trainer"=>$_POST["trainer"],
      "cedula"=>$_POST["cedula"]
  ];
  $data = json_encode($data);
  $credenciales["http"]["content"] = $data;
  $config = stream_context_create($credenciales);

  $_DATA = file_get_contents("https://64828fa7f2e76ae1b95b4d7f.mockapi.io/usuarios", false, $config);
  print_r($_DATA);
?>