<?php    
    $response = "";
    $instruccion1 = "";
    $instruccion2 = "";


    if (!empty($_FILES['file']['tmp_name'])) {
        if ($fop = fopen($_FILES['file']['tmp_name'],"r")){
            
            $i = 1;
            $list = [];

            while (!feof($fop)) {
                $buffer = fgets($fop);

                if (!empty($buffer)) {
                    if ($i == 1) {
                        $lengString = $buffer;
                    } elseif ($i == 4) {
                        $message = $buffer;
                    } else {
                        array_push($list, trim($buffer));
                    }                            
                }

                $i++;
            }

            $tamano = explode(" ",$lengString);
            $decode = preg_replace("/(.)\\1+/","$1",$message);

            if (strlen($list[0]) == $tamano[0]) {
                if (strlen($list[1]) == $tamano[1]) {
                    for ($i=0; $i < sizeof($list); $i++) { 
                        
                        if (strpos($decode,preg_replace("/(.)\\1+/","$1",$list[$i]))) {
                            $response = $list[$i];

                            $instruccion1 = ($list[0] == $response) ? 'SI' : 'NO' ;
                            $instruccion2 = ($list[1] == $response) ? 'SI' : 'NO' ;

                            break;
                        } else {
                            $response = "No existe ninguna instrucción en el mensaje";
                        }                        
                    }

                } else {
                    $error = 'La cantidad de caracteres de la segunda instrucción es diferente a la longitud proporcionada';
                }                    
            } else {
                $error = 'La cantidad de caracteres de la primer instrucción es diferente a la longitud proporcionada';
            }                

        } else {
            $error = 'No fue posible encontrar el archivo';
        }
    } else {
        $error = 'Por favor elige un archivo';
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neubux ejercicio 1</title>

    <!-- style -->
    <link rel="stylesheet" href="main.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    
    <main>
        
        <section class="contenent">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data"> 
                <label for="file">
                    Seleccionar Archivo
                    <input type="file" name="file" id="file" accept="text/plain" >
                </label>
                <button type="submit" class="btn">Analizar</button>
            </form>

            <span>
                <?php echo $err = (!empty($error)) ? $error : '' ; ?>
            </span>

            <div class="resultado">
                <h1>Respuesta</h1> 
                <p class="">
                    <?php 
                        if (!empty($instruccion1) and !empty($instruccion2)) {
                            echo $instruccion1;
                            echo '<br/>';
                            echo $instruccion2;
                        }else{
                            echo $response;
                        }
                    ?>
                </p>
            </div>
        </section>

    </main>

</body>
</html>