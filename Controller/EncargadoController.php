<?php
require_once "../Model/EncargadoModel.php";


$encargadoModel = new EncargadoModel();

if($_POST["function"] == "register-encargado") {
    $duiEncargado = (int)str_replace("-", "", $_POST["dui-encargado"]);
    $nombreEncargado = $_POST["nombre-encargado"];
    $direccionEncargado = $_POST["direccion-encargado"];
    $parentesco = $_POST["parentesco"];
    $response = $encargadoModel->RegisterEncargado($duiEncargado, 
        $nombreEncargado, $direccionEncargado, $parentesco);
    echo json_encode($response);
}

if($_POST["function"] == "search-encargado") {
    $duiEncargado = (int)str_replace("-", "", $_POST['dui']);
    $response = $encargadoModel->SearchEncargado($duiEncargado);
    echo json_encode($response);
}

?>
