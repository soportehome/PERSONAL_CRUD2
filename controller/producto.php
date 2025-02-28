<?php 
require_once ("../config/conexion.php");
require_once ("../models/Producto.php");

$producto =new Producto(); // se indica q la variable $producto es un nuevo objeto de la class Producto del archivo Producto.php
    switch ($_GET ["op"]) { //se crea un switch case con opciones llamado op para manejar el controlador.
        case "listar": ///cuando llamemos listar nos muestre una información
            $datos= $producto->get_producto(); ///captura datos se indica que cuando se enliste los productos, 
                // se llame al metodo get_producto().
            $data=Array();  
            foreach($datos as $row){
                $sub_array= array();
                $sub_array[] =$row["prod_nom"];
                $sub_array[] =$row["fech_crea"]; 
                $sub_array[] =$row["prod_id"];///el nombre del campo de la base de datos $row["prod_nom"]
                $sub_array[] ='<button type="button" onCLick="editar('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] ='<button type="button" onCLick="eliminar('.$row["prod_id"].');" id="'.$row["prod_id"].'"class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
                $data[]=$sub_array;
            }
            
            //se agrega un foreach para que repita tantos registros haya capturado en datos  se hayan capturado en la variable $data   
            $results =array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
                echo json_encode($results);

// /// inf para llenar todos los datatables js siempre van a tener la misma estructura para 
//             break;
//          case "guardaryeditar":
//             $datos       

}   


?>