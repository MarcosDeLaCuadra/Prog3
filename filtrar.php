<?php
    include_once "persona.php";
    include_once "empleado.php";
    include_once "fabrica.php";

if(isset($_POST['filtrar']))
{
    echo $_POST['txtFilNombre'];
    $conexion =mysqli_connect("localhost","root","", "empleado");   
     $consulta=mysqli_query($conexion, "SELECT * FROM empleado WHERE nombre = '". $_POST['txtFilNombre'] ."' " );
     
     // $filas =mysqli_fetch_array($consulta);
     $arrEmpleados = array();
     $cont=0;
      while ($filas = mysqli_fetch_object($consulta))
       {
           $arrEmpleados[$cont] = $filas;
           $cont = $cont + 1 ;
        }
        var_dump($arrEmpleados);
            for ($i=0; $i < sizeof($arrEmpleados) ; $i++) 
           { 
                $empleado[$i] = new Empleado($arrEmpleados[$i]->nombre, $arrEmpleados[$i]->apellido , $arrEmpleados[$i]->dni , $arrEmpleados[$i]->sexo, $arrEmpleados[$i]->sueldo ,$arrEmpleados[$i]->legajo ,$arrEmpleados[$i]->foto);
          
               if( true){
                 
               }
              
           } 
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

            for ($i=0; $i < sizeof($empleado) ; $i++) 
           { 
              
           
              
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
               

            
           }
           $mostrar = $mostrar.  ' </table>   </tbody></html>';
           echo $mostrar ;

}

?>