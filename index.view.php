<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginación MySQL y PHP</title>

    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="contenedor">
                    <h1>Artículos</h1>
                    <section class="articulos">
                        <ul>
                            <?php foreach ($articulos as $articulo): ?>
                                <li><?php echo $articulo['ID'] .'.- ' .$articulo['Artículo']?></li>
                            <?php endforeach; ?>
                        </ul>
                    </section>
            
                    <section class="paginacion">
                        <ul>
                            <?php if($pagina == 1): ?>
                                <li class="disabled">&laquo;</li>
                            <?php else: ?>
                                <li><a href="?pagina=<?php echo $pagina - 1?>">&laquo;</a></li>
                            <?php endif; ?>

                            <?php 
                                for ($i=1; $i <= $numeroPaginas; $i++) { 
                                    if ($pagina == $i) {
                                        echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
                                    }else{
                                        echo "<li><a href='?pagina=$i'>$i</a></li>";
                                    }
                                }
                            ?>

                            <?php if($pagina == $numeroPaginas): ?>
                                <li class="disabled">&raquo;</li>
                            <?php else: ?>
                                <li><a href="?pagina=<?php echo $pagina + 1?>">&raquo;</a></li>
                            <?php endif; ?>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>