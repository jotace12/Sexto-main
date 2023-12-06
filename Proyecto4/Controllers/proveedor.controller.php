<?php
require_once('../Models/cls_proveedor.model.php');
$proveedores = new Clase_proveedor;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $proveedores->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;

    case "uno":
        $codproveedor = $_POST["codproveedor"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $proveedores->uno($codproveedor); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
        case 'insertar':
            $nomPro = $_POST['nomPro'];
            $contacto = $_POST['contacto'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
        
            $datos = array(); //defino un arreglo
            $datos = $proveedores->insertar($nomPro, $contacto, $telefono, $direccion); //llamo al modelo de usuarios e invoco al procedimiento insertar
        
            if ($datos === 'ok') {
                echo json_encode(['status' => 'ok']);
            } else {
                echo json_encode(['status' => 'error', 'message' => $datos]);
            }
            break;
    case 'actualizar':
        $codproveedor = $_POST["codproveedor"];
        $nomPro = $_POST["nomPro"];
        $contacto = $_POST["contacto"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];

        $datos = array(); //defino un arreglo
        $datos = $proveedores->actualizar($codproveedor, $nomPro, $contacto, $telefono, $direccion); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $codproveedor = $_POST["codproveedor"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $proveedores->eliminar($codproveedor); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
  
    case "proveedor_repetido":
        $nomPro = $_POST["nomPro"];
        $datos = array(); //defino un arreglo
        $datos = $proveedores->proveedor_repetido($nomPro); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
  
}
