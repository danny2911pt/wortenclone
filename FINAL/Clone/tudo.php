<link rel="stylesheet" type="text/css" href="css/novidades.css">
<?php

include "connections/conn.php";
$query = mysqli_query($conn, "select artigos.* from artigos");
include "connections/conn.php";

$i = 0;
while($array = mysqli_fetch_array($query))
{
    if ($i == 0) echo '<div style="display: table; width: 90%; margin: 1%; margin-left: 8%; margin-right: 0;">';

    if ($array["art_promo"] == 1) $preco = $array["art_precopromo"];
    else $preco = $array["art_preco"];

    echo '
    <a href="?n=10&art_id='.$array["art_id"].'" style="text-decoration: none; color: black;">
    <div class = "mother d'.$i.'">
        <div class = "filha">
            <div class="carta titulo">
                <div style="display: table-cell; width: 50%">'.$array["art_nome"].'</div>
                <div style="display: table-cell; width: 50%; text-align: right">'.$preco.'€</div>
            </div>
               
            <div class="carta imagem"><img style="width: 100%" src="img/'.$array["art_img"].'"></div>
            
            <div class="carta desc">'.$array["art_descricao"].'</div>
        </div>
    </div>
    </a>
    ';

    $i++;

    if ($i == 4)
    {
        $i = 0;
        echo '</div>';
    }
}

if ($i != 0) echo '</div>';
