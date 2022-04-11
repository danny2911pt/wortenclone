<div class="container">
    <h1>Adicionar Produto</h1>
    <hr>
    <br>

    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label class="col-lg-3 control-label">Nome do Produto:</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" id="nomeP">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Preço:</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" id="preco">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Preço Promo:</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" id="precoP">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Descriçao:</label>
            <div class="col-lg-8">
                <textarea class="form-control" rows="4" id="descP"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Informação Adicional:</label>
            <div class="col-lg-8">
                <textarea class="form-control" rows="2" id="maisInfo"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Categoria:</label>

            <div class="col-lg-8">
                    <select class="form-control" id="categoria">
                        <?php
                        include "../Clone/connections/conn.php";

                        $query = mysqli_query($conn, "select categoria.descricao from categoria order by descricao");
                        while ($array = mysqli_fetch_array($query))
                        {
                            echo '
                               <option>'.$array["descricao"].'</option>
                            ';
                        }
                        include "../Clone/connections/deconn.php";
                        ?>
                    </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Promo Line:</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" id="promoL">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Promoção:</label>

            <div class="col-lg-8">
                <input type="checkbox" value="" id="promo">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Destaque:</label>
                <div class="col-lg-8">
                    <input type="checkbox" value="" id="destaque">
                </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Imagem:</label>

            <div class="col-lg-8">
                <input type="file" class="" id="imagem">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
                <input type="submit" class="btn btn-success" value="Adicionar" onclick="addP()">
                <input type="button" onclick="window.location='homepage.php#produtos';" class="btn btn-default" value="Retroceder" >
            </div>
        </div>
    </form>
</div>

<script>
    function addP()
    {

        var nomeP = document.getElementById("nomeP").value;
        var preco = document.getElementById("preco").value;
        var precoP = document.getElementById("precoP").value;
        var descP = document.getElementById("descP").value;
        var info = document.getElementById("maisInfo").value;
        var categoria = document.getElementById("categoria").value;
        var pLine = document.getElementById("promoL").value;

        if (document.getElementById("promo").checked == true) var ispromo = 1;
        else var ispromo = 0;

        if (document.getElementById("destaque").checked == true) var isdestaque = 1;
        else var isdestaque = 0;

        var img = document.getElementById("imagem").value;

        location.href = "db.php?opc=addP&nome="+nomeP+"&preco="+preco+"&precoP="+precoP+"&descricao="+descP+"&info="+info+"&categoria="+categoria+"&pLine="+pLine+"&ispromo="+ispromo+"&isdestaque="+isdestaque+"&img="+img;
    }
</script>



