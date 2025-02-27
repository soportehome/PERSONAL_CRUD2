<?php
    class Producto extends Conectar{ /// extiende una clase Conectar del archibo conexion.php
       public function get_producto (){
        // de documentacion que indica que declare una variable $conectar del archivo conexion.php 
        //con una nueva funcion llamada conexion y  que pertenece al archivo productos.php

            $conectar=parent:: conexion(); //como esta la clase Producto extendido de Conectar del archibo conexion.php puedo usar la varialble
        // llamada $conectar. // se debe declara una variable $conectar
            parent::set_names(); /// para de igual manera utilizar la variable set_names
            // y no tener problemas con acentos y ñ
            $sql ="SELECT * FROM tm_producto WHERE est=1 ";
            $sql =$conectar-> prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 
        public function get_producto_x_id ($prod_id){
             /// se requiere ingresar el mismo nombre que se tiene en la base de datos , ya que va a realizar una busqueda por prod_id
                $conectar=parent:: conexion(); //como esta la clase Producto extendido de Conectar del archibo conexion.php puedo usar la varialble
            // llamada $conectar.
                parent::set_names(); /// para de igual manera utilizar la variable set_names
                // y no tener problemas con acentos y ñ
                $sql ="SELECT * FROM tm_product WHERE prod_id =?";
                $sql =$conectar-> prepare($sql); ///cuando se necesita un parametro se ingresa luego de prepare sql
                $sql->bindValue(1,$prod_id); //bindValue() vincula el valor $prod_id al primer marcador de la consulta, asegurando que se pase de manera segura y previniendo inyecciones SQL.
                // bindValue es una palabra reservada segun la documentacion se debe ingresar el campo que se 
                $sql->execute();
                return $resultado=$sql->fetchAll();
        }

        public function delete_producto_ ($prod_id){
            /// se requiere ingresar el mismo nombre que se tiene en la base de datos , ya que va a realizar una busqueda por prod_id
               $conectar=parent:: conexion(); //como esta la clase Producto extendido de Conectar del archibo conexion.php puedo usar la varialble
           // llamada $conectar.
               parent::set_names(); /// para de igual manera utilizar la variable set_names
               // y no tener problemas con acentos y ñ
               $sql ="UPDATE tm_product 
                    SET 
                        est=0,
                        fech_elim= now() /*indicará la fecha actual para registrar la eliminacion */
                        WHERE
                        prod_id = ?";

               $sql =$conectar-> prepare($sql); ///cuando se necesita un parametro se ingresa luego de prepare sql
               $sql->bindValue(1,$prod_id); //bindValue() vincula el valor $prod_id al primer marcador de la consulta, asegurando que se pase de manera segura y previniendo inyecciones SQL.
               // bindValue es una palabra reservada segun la documentacion se debe ingresar el campo que se 
               $sql->execute();
               return $resultado=$sql->fetchAll();
       }

       public function insert_producto_ ($prod_nom){
        /// se requiere ingresar el mismo nombre del campo que se tiene en la base de datos , ya que va a realizar una busqueda por prod_id
           $conectar=parent:: conexion(); //como esta la clase Producto extendido de Conectar del archibo conexion.php puedo usar la varialble
       // llamada $conectar.
           parent::set_names(); /// para de igual manera utilizar la variable set_names
           // y no tener problemas con acentos y ñ
           $sql ="INSERT INTO tm_product ( prod_id,prod_nom ,fech_crea ,fech_modi ,fech_elimi ,est ) VALUES (NULL, ?,now(), '', '', '1')"; /*INSERT INTO `crud2`.`tm_producto` (`prod_nombre`, `fech_crea`, `fech_modi`, `fech_elimi`, `est`) VALUES ('mousepad', '', '', '', '1');  SE ENVIA EL NOW() PARA QUE SE REGISTRE FECHA DE CREACION y el prod_id se le da en valor null en values*/ 
           $sql =$conectar-> prepare($sql); ///cuando se necesita un parametro se ingresa luego de prepare sql
           $sql->bindValue(1,$prod_nom); //bindValue() vincula el valor $prod_id al primer marcador de la consulta, asegurando que se pase de manera segura y previniendo inyecciones SQL.
           // bindValue es una palabra reservada segun la documentacion se debe ingresar el campo que se 
           $sql->execute();
           return $resultado=$sql->fetchAll();
        }
        
        public function update_producto_ ($prod_id, $prod_nom){
            /// se requiere ingresar el mismo nombre que se tiene en la base de datos , ya que va a realizar una busqueda por prod_id //se necesita dos parametros el $pro_id y el $prod_nom        
               $conectar=parent:: conexion(); //como esta la clase Producto extendido de Conectar del archibo conexion.php puedo usar la varialble
           // llamada $conectar.
               parent::set_names(); /// para de igual manera utilizar la variable set_names
               // y no tener problemas con acentos y ñ
               $sql ="UPDATE tm_product 
                    SET (
                   prod_nom= ?,
                   fech_modi= now()
                    WHERE
                     prod_id=?";
               $sql =$conectar-> prepare($sql); ///cuando se necesita un parametro se ingresa luego de prepare sql
               $sql->bindValue(1, $prod_nom);
               $sql->bindValue(2, $prod_id); //bindValue() vincula el valor $prod_id al primer marcador de la consulta, asegurando que se pase de manera segura y previniendo inyecciones SQL.
               // bindValue es una palabra reservada segun la documentacion se debe ingresar el campo que se 
               $sql->execute();
               return $resultado=$sql->fetchAll();
            }


    }






?>