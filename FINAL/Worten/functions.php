<?php
function adlog($mail, $pass)
{
    include "../Clone/connections/conn.php";
    $mail = mysqli_real_escape_string($conn, $mail);
    $pass = mysqli_real_escape_string($conn, $pass);

    $leremails = mysqli_query($conn,"SELECT ad_mail, ad_pass FROM ad_login WHERE ad_mail = '$mail' AND ad_pass = '$pass'");
    $respostaemails = mysqli_fetch_array($leremails);

    if(!$respostaemails)
    {
        echo '<script language="javascript">';
        echo 'alert("Administrador não encontrado")';
        echo '</script>';
        echo '<meta http-equiv="refresh">';
    }
    else
    {
        session_start();
        $_SESSION["ad_mail"] = $respostaemails["ad_mail"];
        echo'<meta http-equiv="refresh" content="0;url=homepage.php#basico">';
    }

    include '../Clone/connections/deconn.php';
}

function adlogout(){
    session_destroy();
    unset ($_SESSION["ad_mail"]);
    echo '<meta http-equiv="refresh" content="0;url=index.php">';
}

function rankviews()
{
    include "../Clone/connections/conn.php";

    $rankear = mysqli_query($conn,"SELECT art_id,art_nome,art_views from artigos order by art_views desc");
    $i=1;
    while($loucura=mysqli_fetch_array($rankear)){

        echo '<tr>';
        echo "<td style='text-align:center'>".$i."</td>";
        echo"<td>".$loucura["art_nome"]."</td>";
        echo"<td>".$loucura["art_views"]."</td>";
        echo '</tr>';
        $i++;
    }
    include '../Clone/connections/deconn.php';
}