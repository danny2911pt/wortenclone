<?php
    session_start();
    
if(@!$_SESSION["ad_mail"]){
 echo'<meta http-equiv="refresh" content="0;url=index.php">';
}
?>

<!doctype html>
<?php
  
    //Dados

    $titulos = ["Produtos", "Categorias", "Pagamentos", "Relatório Comercial"];
    $imagens = ["vibrator", "list", "invoice", "diagram"];
    $paginas = ["homepage.php#produtos", "homepage.php#categorias", "homepage.php#pagamentos", "homepage.php#comercial"];

    include '../Clone/connections/conn.php';
        mysqli_set_charset($conn,'utf8mb4');
    include '../Clone/connections/deconn.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Css-->
    <link rel="stylesheet" type="text/css" href="css/edita.css">
    <link rel="stylesheet" type="text/javascript" href="js/edita.js">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    
        <!--BootStrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!--Scripts-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <title>Administrador</title>
</head>
<body>
      <form method="post" class="float-right">
      <button type="submit" name="bouembora" class="btn btn-default btn-sm btn-danger">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
      </form>
      <?php
      if(isset($_POST["bouembora"])){
        include '../Worten/functions.php';
        adlogout();
				}
				?>
    <div class="contentor">
        <div class="sidebar" style="vertical-align: top">
            <a href="#basico" style="text-decoration: none; color: white">
                <div class="categoria home">
                    <img src="imagens/house.png" alt="casa" style="vertical-align: middle; filter: invert(100%); width: 50%; text-align: center">
                    <h2>Home</h2>
                </div>
            </a>

            <?php
            for ($i = 0; $i < 4; $i++)
            {
                echo '
                    <a href="'.$paginas[$i].'" style="text-decoration: none; color: white">
                        <div class="categoria c'.$i.'">
                            <img src="imagens/'.$imagens[$i].'.png" style="vertical-align: center; width: 50%; filter: invert(100%)">
                            <h2>'.$titulos[$i].'</h2>
                        </div>
                    </a>
                ';
            }
            ?>

            <a href="../Clone/index.php">
                <div class="categoria de_volta">
                    <img src="imagens/domain.png" style="filter: invert(100%); margin-top: 10%;">
                </div>
            </a>
        </div>

        <div class="principal">
            <div id="produtos">
              <?php include "l_produtos.php";?>
            </div>

            <div id="categorias">
                <?php include "add_categoria.php";?>
                <?php include "l_categorias.php"; ?>
            </div>

            <div id="pagamentos">
            
            </div>

            <div id="comercial">
                <?php include "relatorio.php"?>
            </div>

            <div id="basico">
                <?php include "home.php"?>
            </div>

            <div id="addProduto">
                <?php include "add_produto.php";?>
            </div>

            <div id="editProduto">
                <?php include "edit_produto.php"?>
            </div>
        </div>
    </div>
    
</body>
</html>
