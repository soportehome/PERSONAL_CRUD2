<?php

class Conectar
{
    protected $dbh; //variable protegida dbhost
    protected function conexion()
    {    //funcion protegida que se llama conexion

        try {
            $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=crud2", "root", ""); //clave vacia ;se utiliza PDO con base de dato mysql
            return $conectar; ///para que retorne un valor de la variable conectar
        } catch (Exception $e) {
            print "!Error BD¡:" . $e->getMessage() . "<br/>";
            die(); //terminamos la conexion 
        }
    }

    public function set_names()
    { //funcion llamada set_names retornará la misma función para nuestra variable protegida
        return $this->dbh->query("SET NAMES 'utf8'"); /// para asegurarnos de no tener errores por tildes o ñ

    }
}

/*INSERT INTO `crud2`.`tm_producto` 
(`prod_nom`
 `fech_crea`, 
 `fech_modi`, `
 fech_elimi`, 
 est`) 
 VALUES ('parlantes', '2025-02-24 18:48:40', '2025-02-24 18:48:40', '2025-02-24 18:48:40', '1'); */