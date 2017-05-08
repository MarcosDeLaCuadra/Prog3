<?php

      include_once "persona.php";
    include_once "empleado.php";
    include_once "fabrica.php";
    include_once "AccesoDatos.php";
   //include_once "funciones.js";



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

            for ($i=0; $i < sizeof($arrEmpleados) ; $i++) 
           { 
                $empleado[$i] = new Empleado($arrEmpleados[$i]->nombre, $arrEmpleados[$i]->apellido , $arrEmpleados[$i]->dni , $arrEmpleados[$i]->sexo, $arrEmpleados[$i]->sueldo ,$arrEmpleados[$i]->legajo ,$arrEmpleados[$i]->foto);
          
               if( true){
                 
               }
              
           } 
      
     //   var_dump($arrEmpleados);
      
   //  var_dump($consulta);
    // $id= 2;
    
      
     
      ////////////// ASI SE SELECCIONA UNO SOLO
    /* $asd= mysqli_query($conexion, "SELECT `nombre` FROM Empleado ");
     $asd2=mysqli_fetch_object($asd);
     var_dump($asd2);
     echo "<br>";*/

      /*	$obj =  AccesoDatos::DameUnObjetoAcceso();
		$consulta2 = $obj->RetornarConsulta("SELECT  legajo AS _legajo , sueldo AS _sueldo , apellido AS _apellido ,  foto AS _foto  ,  dni AS  _dni , nombre AS _nombre , sexo AS _sexo  FROM Empleado WHERE 1");
		var_dump($consulta2);
        $consulta2->execute();
        $aux = $consulta2->FetchAll(PDO::FETCH_CLASS, "Empleado");
        var_dump($aux);
	  //  var_dump( $consulta2->FetchAll(PDO::FETCH_CLASS, "Empleado"));
         echo "<br>";  
          echo "<br>";  
           echo "<br>";  
           echo"aaaaaaaaaaaaaaaaaa";
      // echo $consulta2[1]->getApellido();*/


     /*  foreach ($arrEmpleados as $item ) {
            # code...
           
            $empleado[0] = new Empleado($item->nombre, $item->apellido , $item->dni , $item->sexo, $item->sueldo ,$item->legajo ,$item->foto);
          
        }*/
   
                
     /*     for ($i=0; $i < sizeof($filas) ; $i++) 
           { 
               if( true){
                  $empleado[0] = new Empleado($filas->nombre, $filas->apellido , $filas->dni , $filas->sexo, $filas->sueldo ,$filas->legajo ,$filas->foto);
          
               }
              
           }*/


        //  var_dump($empleado);

           // unset($empleado[6]);



           $mostrar= '<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">  
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <title>Fabrica</title>
</head>
<body style=" background-color:#A9E2F3"  >
           <div class="container">
                <div class="table-responsive">
                        
                        <table class="table table-striped table-bordered table-hover table-condensed " style=" background-color:#819FF7" >
                            <thead>
                                
                                <tr>   <h1>
                                    <th>Nombre </th>
                                    <th>Apellido</th>
                                    <th>Legajo</th>
                                    <th>Sexo</th>
                                    <th>Sueldo</th>
                                    <th>Dni</th>
                                    <th>Foto</th></h1>
                                </tr>

                            </thead> <tbody>';

             //  echo $mostrar;             

          //   var_dump($empleado);
            for ($i=0; $i < sizeof($empleado) ; $i++) 
           { 
              
              //ACA ESTA EL PROBLEMA EL EVENTO ONCLICK FUNCIONA SIEMPRE SIN HACER CLICK
              
                   $mostrar = $mostrar. '

                           
                                
                             <tr>   
                                    <td>'. $empleado[$i]->getNombre().'</td>
                                    <td>'. $empleado[$i]->getApellido().'</td>
                                    <td>'.$empleado[$i]->getLegajo().'</td>
                                    <td>'.$empleado[$i]->getSexo().'</td>
                                    <td>'.$empleado[$i]->getSueldo().'</td>
                                    <td>'.$empleado[$i]->getDni().'</td>
                                    <td>'.$empleado[$i]->getFoto().'</td>
                                    <td><form method="POST" action="eliminar.php">
                                    <button type="submit" name="eliminar" value= '.$empleado[$i]->getDni() . '>Eliminar</button> 
                                    </form></td>

                                  
                                  
                               </tr>
                              
                          
                           
                            
                      

               ';
               

              // echo $empleado[$i]->getFoto();
             // <td><a id="idEl" onclick= "eliminar('.$empleado[$i]->getDni().')" href="#">Eliminar</a></td>
           }
           $mostrar = $mostrar.  ' </table>   </tbody></html>';
           echo $mostrar ;
         
           //ejemplo de foto
        //   echo "<img src=\"http://bucket1.glanacion.com/anexos/fotos/33/motogp-2412833w620.jpg\">"; 
         
    //<td><a id="idEl" onclick="Eliminar('.$empleado[$i]->getLegajo().')" href="#">Eliminar</a></td> </td>


?>