
<?php

    if(isset($_POST['btnLogin']))
    {
        if( $fr = fopen("login.txt", "r")){ 
                while (!feof($fr)){ 
                    $array[] = fgets($fr,9999); 
                } 
                fclose($fr); 
                }
                 
              
            $arrLogin[0]=null;
          
           for ($i=0; $i < sizeof($array) ; $i++) 
           { 
             $arrLogin[$i] = explode("--", $array[$i]);
           }
           $usuario=  $_POST['txtUsuario'];
           $pass = $_POST['txtPass'];
         
           $flag=0;
            for ($i=0; $i < sizeof($arrLogin) ; $i++) 
           { 
                if( $usuario ==  $arrLogin[$i][0] && $pass == $arrLogin[$i][1])
                {
                   
                    echo " usuario correcto  redireccionando";
                    
                    header('Location: index.html');
                    $flag=1;
                    

                }
             
           }

           if( $flag == 0)
           {
                echo " usuario incorrecto  redireccionando";
                    header('Location: login.html');
           }
           

           // 
    }
    else{

        echo "usuario incorrecto ";
         header('Location: login.html');
    }

      
    sleep(3);
?>