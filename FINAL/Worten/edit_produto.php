<?php
    include "../Clone/connections/conn.php";
    $id = $_GET["id"];
    $queryM = mysqli_query($conn, "select artigos.* from artigos where art_id = $id");
    $arrayM= mysqli_fetch_array($queryM);

    $queryC = mysqli_query($conn, "select categoria.descricao from categoria where categoria.id = $arrayM[art_categoria]");
    $arrayC = mysqli_fetch_array($queryC);

    include "../Clone/connections/deconn.php";

    echo '
        <div class="container">
        <h1>Adicionar Produto</h1>
        <hr>
        <br>
        
        <input id="EidP" value="'.$id.'" hidden></div>
        
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-lg-3 control-label">Nome do Produto:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" id="EnomeP" value="'.$arrayM["art_nome"].'">
                </div>
            </div>
    
            <div class="form-group">
                <label class="col-lg-3 control-label">Preço:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" id="Epreco" value="'.$arrayM["art_preco"].'">
                </div>
            </div>
    
            <div class="form-group">
                <label class="col-lg-3 control-label">Preço Promo:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" id="EprecoP" value="'.$arrayM["art_precopromo"].'">
                </div>
            </div>
    
            <div class="form-group">
                <label class="col-lg-3 control-label">Descriçao:</label>
                <div class="col-lg-8">
                    <textarea class="form-control" rows="4" id="EdescP" >'.$arrayM["art_descricao"].'</textarea>
                </div>
            </div>
    
            <div class="form-group">
                <label class="col-lg-3 control-label">Informação Adicional:</label>
                <div class="col-lg-8">
                    <textarea class="form-control" rows="2" id="EmaisInfo">'.$arrayM["art_infoadicional"].'</textarea>
                </div>
            </div>
    
            <div class="form-group">
                <label class="col-lg-3 control-label">Categoria:</label>
    
                <div class="col-lg-8">
                    <select class="form-control" id="Ecategoria">
    ';
                        include "../Clone/connections/conn.php";

                        $query = mysqli_query($conn, "select categoria.descricao from categoria order by descricao");
                        while ($array = mysqli_fetch_array($query))
                        {
                            if ($array["descricao"] == $arrayC["descricao"]) echo '<option selected>'.$array["descricao"].'</option>';
                            else echo '<option>'.$array["descricao"].'</option>';
                        }
                        include "../Clone/connections/deconn.php";
    echo '
                    </select>
                </div>
           </div>
            
           <div class="form-group">
                <label class="col-lg-3 control-label">Promo Line:</label>
                
                <div class="col-lg-8">
                    <input class="form-control" type="text" id="EpromoL" value="'.$arrayM["art_promoline"].'">
                </div>
           </div>
            
           <div class="form-group">
                <label class="col-lg-3 control-label">Promoção:</label>
           
                <div class="col-lg-8">
    ';
               if($arrayM["art_promo"] == 1) echo '<input type="checkbox" value="" id="Epromo" checked>';
               else echo '<input type="checkbox" value="" id="Epromo">';
    echo '
               </div>
           </div>
            
           <div class="form-group">
                <label class="col-lg-3 control-label">Destaque:</label>
          
                <div class="col-lg-8">
    ';
                    if ($arrayM["art_destaque"] == 1) echo '<input type="checkbox" id="Edestaque" checked>';
                    else echo '<input type="checkbox" value="" id="Edestaque">';
    echo '
                </div>
           </div>
            
           <div class="form-group">
                <label class="col-md-3 control-label">Imagem:</label>
            
                <div class="col-lg-8">
                    <input type="file" class="" id="Eimagem" value="'.$arrayM["art_img"].'">
                </div>
           </div>
            
           <div class="form-group">
                <label class="col-md-3 control-label"></label>
                
                <div class="col-md-8">
                    <input type="button" class="btn btn-success" value="Update" onclick="editP()">
                    <input type="button" onclick="window.location=\'homepage.php#produtos\';" class="btn btn-default" value="Retroceder" >
                </div>
           </div>
        </form>
    </div>
    ';
?>

<script>
    function editP()
    {
        var nomeP = document.getElementById("EnomeP").value;
        var preco = document.getElementById("Epreco").value;
        var precoP = document.getElementById("EprecoP").value;
        var descP = document.getElementById("EdescP").value;
        var info = document.getElementById("EmaisInfo").value;
        var categoria = document.getElementById("Ecategoria").value;
        var pLine = document.getElementById("EpromoL").value;
        var id = document.getElementById("EidP").value;

        var ispromo;
        if (document.getElementById("Epromo").checked === true) ispromo = 1;
        else ispromo = 0;

        var isdestaque;
        if (document.getElementById("Edestaque").checked === true) isdestaque = 1;
        else isdestaque = 0;

        var img = document.getElementById("Eimagem").value;

        if(img.length === 0) location.href = "db.php?opc=editP&id="+id+"&nome="+nomeP+"&preco="+preco+"&precoP="+precoP+"&descricao="+descP+"&info="+info+"&categoria="+categoria+"&pLine="+pLine+"&ispromo="+ispromo+"&isdestaque="+isdestaque+"&img="+img;
        else location.href = "db.php?opc=editP&id="+id+"&nome="+nomeP+"&preco="+preco+"&precoP="+precoP+"&descricao="+descP+"&info="+info+"&categoria="+categoria+"&pLine="+pLine+"&ispromo="+ispromo+"&isdestaque="+isdestaque;

    }
</script>





