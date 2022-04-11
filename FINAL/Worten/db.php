<?php
$opc = $_GET["opc"];

switch ($opc)
{
    case "delP":
        include "../Clone/connections/conn.php";

        $id = $_GET["id"];
        mysqli_query($conn, "delete artigos.* from artigos where art_id = $id");

        include "../Clone/connections/deconn.php";

        //Redirect
        echo '
            <meta http-equiv="refresh" content="0;url=homepage.php#produtos">
        ';

        break;


    case "delC":
        include "../Clone/connections/conn.php";

        $id = $_GET["id"];
        $query = mysqli_query($conn, "select art_categoria from artigos where art_categoria = $id");

        if (mysqli_num_rows($query) == 0)
            mysqli_query($conn, "delete categoria.* from categoria where categoria.id = $id");
        else
            echo '<script>alert("A categoria que pretende eliminar tem produtos relacionados.")</script>';

        include "../Clone/connections/deconn.php";

        //Redirect
        echo '
            <meta http-equiv="refresh" content="0;url=homepage.php#categorias">
        ';

        break;


    case "addC":
        include "../Clone/connections/conn.php";

        $descricao = $_GET["descricao"];
        mysqli_query($conn, "insert into categoria(descricao) values ('$descricao')");

        include "../Clone/connections/deconn.php";

        //Redirect
        echo '
            <meta http-equiv="refresh" content="0;url=homepage.php#categorias">
        ';
        break;

    case "addP":
        include "../Clone/connections/conn.php";
        //Dados
        $nomeP = $_GET["nome"];
        $preco = $_GET["preco"];
        $precoP = $_GET["precoP"];
        $descricao = $_GET["descricao"];
        $info = $_GET["info"];

        $query = mysqli_query($conn, "select categoria.id from categoria where categoria.descricao = '$_GET[categoria]'");
        $cat = mysqli_fetch_array($query);

        $pLine = $_GET["pLine"];
        $ispromo = $_GET["ispromo"];
        $isdestaque = $_GET["isdestaque"];
        $imgg = $_GET["img"];
        $img = explode("\\", $imgg)[2];

        //Insert
        mysqli_query($conn, "insert into artigos(art_img, art_nome, art_promoline, art_descricao, art_infoadicional, art_preco, art_precopromo, art_destaque, art_views, art_promo, art_categoria, art_vendas) values ('$img', '$nomeP', '$pLine', '$descricao', '$info', '$preco', '$precoP', '$isdestaque', 0, '$ispromo', '$cat[0]', 0)");

        include "../Clone/connections/deconn.php";

        //Redirect
        echo '<meta http-equiv="refresh" content="0;url=homepage.php#produtos">';
        break;

    case "editP":
        include "../Clone/connections/conn.php";
        //Dados
        $id = $_GET["id"];
        $nomeP = $_GET["nome"];
        $preco = $_GET["preco"];
        $precoP = $_GET["precoP"];
        $descricao = $_GET["descricao"];
        $info = $_GET["info"];

        $query = mysqli_query($conn, "select categoria.id from categoria where categoria.descricao = '$_GET[categoria]'");
        $cat = mysqli_fetch_array($query);

        $pLine = $_GET["pLine"];
        $ispromo = $_GET["ispromo"];
        $isdestaque = $_GET["isdestaque"];
        $imgg = $_GET["img"];
        @$img = explode("\\", $imgg)[2];

        //Update
        if ($imgg)
        {
            mysqli_query($conn, "update artigos 
                                        set art_img = '$img', art_nome = '$nomeP', art_promoline = '$pLine', art_descricao = '$descricao' , 
                                            art_infoadicional = '$info', art_preco = '$preco', art_precopromo = '$precoP', 
                                            art_destaque = '$isdestaque', art_promo = '$ispromo', art_categoria = '$cat[0]' 
                                        where art_id = $id");
        }
        else
        {
            mysqli_query($conn, "update artigos 
                                        set art_nome = '$nomeP', art_promoline = '$pLine', art_descricao = '$descricao' , 
                                            art_infoadicional = '$info', art_preco = '$preco', art_precopromo = '$precoP', 
                                            art_destaque = '$isdestaque', art_promo = '$ispromo', art_categoria = '$cat[0]' 
                                        where art_id = $id");
        }

        include "../Clone/connections/deconn.php";

        //Redirect
        echo '<meta http-equiv="refresh" content="0;url=homepage.php#produtos">';
        break;


    case "editC":
        //Dados
        $id = $_GET["id"];
        $desc = $_GET["desc"];

        //Query
        include "../Clone/connections/conn.php";
        mysqli_query($conn, "update categoria set descricao = '$desc' where id = $id");
        include "../Clone/connections/deconn.php";

        //Redirect
        echo '<meta http-equiv="refresh" content="0;url=homepage.php#categorias">';
        break;


    case "accept":
        include "connections/conn.php";
        $id = $_GET["id"];
        mysqli_query($conn,"update tb_cart set pendente = 2 where id = $id");

        //Adicionar Vendas
        $query = mysqli_query($conn, "select sum(tb_cartitens.qta) as 'valor', artigos.art_id
                                            from tb_cartitens join tb_cart on tb_cart.cart_id = tb_cartitens.cart_id
                                                              join artigos on artigos.art_id = tb_cartitens.art_id
                                            where tb_cart.id = $id
                                            group by art_id");

        while($array = mysqli_fetch_array($query))
        {
            mysqli_query($conn, "update artigos
                                       set art_vendas = art_vendas + $array[valor]
                                       where art_id = $array[art_id]");
        }

        include "connections/deconn.php";
        echo '<meta http-equiv="refresh" content="0;url=homepage.php#pagamentos">';
        break;

    case "deny":
        include "connections/conn.php";
        $id = $_GET["id"];
        mysqli_query($conn,"update tb_cart set pendente = 0 where id = $id");
        include "connections/deconn.php";
        echo '<meta http-equiv="refresh" content="0;url=homepage.php#pagamentos">';
        break;


    default:
        echo("Default");
        break;
}







