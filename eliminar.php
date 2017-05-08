<?php

    include_once "persona.php";
    include_once "empleado.php";
    include_once "fabrica.php";


     $dni = $_POST['eliminar'];
    
     echo $dni;
    if(isset($_POST['eliminar']))
{

   


    /*
            if( $fr = fopen("empleados.txt", "r")){ 
                while (!feof($fr)){ 
                    $array[] = fgets($fr,9999); 
                } 
                fclose($fr); 
                }
                 

            $objEmpleado[0]=null;
          
           for ($i=0; $i < sizeof($array) ; $i++) 
           { 
             $objEmpleado[$i] = explode("--", $array[$i]);
           }
          //var_dump($objEmpleado);
          
           $empleado[0]=null;

            $cont= 0;

      /*  foreach ($objEmpleado as $item) {
              var_dump($item);
               
               if(is_null($item))
               {
                $empleado[$cont] = new Empleado($item[0], $item[1] , $item[2] , $item[3], $item[4] ,$item[5], $item[6]);
                $cont= $cont + 1; 
               }
                  
              
           }*/
          // var_dump($empleado);

              //TRAER TODOS LOS ATRIBUTOS DE LA BD
    $conexion =mysqli_connect("localhost","root","", "empleado");   
     $consulta=mysqli_query($conexion, "SELECT * FROM empleado WHERE dni > 1 " );
     
     // $filas =mysqli_fetch_array($consulta);
     $arrEmpleados = array();
     $cont=0;
      while ($filas = mysqli_fetch_object($consulta))
       {
           $arrEmpleados[$cont] = $filas;
           $cont = $cont + 1 ;
        }

            $cont=0;
         for ($i=0; $i < sizeof($arrEmpleados) ; $i++) 
           { 
               
               if( $arrEmpleados[$i]->dni != $dni){

                  $empleado[$cont] = new Empleado($arrEmpleados[$i]->nombre, $arrEmpleados[$i]->apellido , $arrEmpleados[$i]->dni , $arrEmpleados[$i]->sexo, $arrEmpleados[$i]->sueldo ,$arrEmpleados[$i]->legajo ,$arrEmpleados[$i]->foto);
                  $cont = $cont + 1;
               }
              
           } 

           var_dump($empleado);

            $conexion =mysqli_connect("localhost","root","", "empleado");   
            $consulta=mysqli_query($conexion, "DELETE FROM `empleado` WHERE `dni` = ". $dni." " );

      
       /*  for ($i=0; $i < sizeof($objEmpleado) ; $i++) 
           { 
               //is_null($objEmpleado)==false
               if(  empty($objEmpleado[$i])==false )
               {
                  $empleado[$i] = new Empleado($objEmpleado[$i][0], $objEmpleado[$i][1] , $objEmpleado[$i][2] , $objEmpleado[$i][3], $objEmpleado[$i][4] ,$objEmpleado[$i][5],$objEmpleado[$i][6]);
                    
               }
             
           }*/

        /*   $fp= fopen("empleados.txt", "w+");        
                fwrite($fp , "");
                fclose($fp);

          
                $fp= fopen("empleados.txt", "a");        
               
               
            for ($i=0; $i < sizeof($empleado) ; $i++) 
           {     
                
              if($empleado[$i]->getDni() != $dni)
               {                       
                    fwrite($fp , $empleado[$i]->ToStr());
               }    
           }
             fclose($fp);
          */
       //  var_dump($empleado); 

            echo '<a href="mostrar.php">El empleado se guardo exitosamente </a>';


}

    

?>