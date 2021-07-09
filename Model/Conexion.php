<?php

class Conexion {

    public static $conexion;

    public static function ConexionDataBase() {
        $usuario = "gestor";
        $password = "gestor1234";
        try {
            self::$conexion = new PDO('mysql:host=localhost;dbname=Gestor', $usuario, $password);
            return self::$conexion;
        }
        catch (PDOException $e) {
            print "!Error" . $e->getMessage(). "<br/>";
            die();
            return null;
        }
    }
}
?>
