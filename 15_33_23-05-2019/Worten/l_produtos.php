<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            include '../Clone/connections/conn.php';
            $query = mysqli_query($conn,'select count(artigos.art_id) from artigos');
            $array = mysqli_fetch_array($query);

            echo '
                <div style="display: table; width: 100%">
                <div style="display: table-cell; text-align: left; width: 50%">
            ';
                    if ($array[0] == 1) echo '<h3><a href="homepage.php#produtos" style="color: black; text-decoration: none">Lista de Produtos ('.$array[0].' Artigo)</a>';
                        else echo '<h3><a href="homepage.php#produtos" style="color: black; text-decoration: none">Lista de Produtos ('.$array[0].' Artigos)</a>';
            echo '
                </div>
                <div style="display: table-cell; text-align: right; width: 50%"></div>
                      <button class="btn btn-success btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="gotoAddP()">
                      <span class="glyphicon glyphicon-plus"></span>
                </button></h3>
                </div>
            ';

            include '../Clone/connections/deconn.php';
            ?>

            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-hover ">
                    <thead style="background-color:#a12431; color: white">
                        <th>Produto</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Preço Promo</th>
                        <th>Categoria</th>
                        <th><a href="?opc=dest#produtos" style="color: white; text-decoration: none">Destaque</a></th>
                        <th><a href="?opc=promo#produtos" style="color: white; text-decoration: none">Promoção</a></th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>

                    <tbody>
                        <?php
                        include '/opt/lampp/htdocs/Clone/connections/conn.php';

                        if (@$_GET["opc"] == "dest") $query = mysqli_query($conn,'select art_id, art_nome, art_descricao, art_preco, art_precopromo, categoria.descricao as "categoria", art_destaque, art_promo from artigos left join categoria on categoria.id = art_categoria where art_destaque = 1 order by art_nome');
                        else if (@$_GET["opc"] == "promo") $query = mysqli_query($conn,'select art_id, art_nome, art_descricao, art_preco, art_precopromo, categoria.descricao as "categoria", art_destaque, art_promo from artigos left join categoria on categoria.id = art_categoria where art_promo = 1 order by art_nome');
                        else $query = mysqli_query($conn,'select art_id, art_nome, art_descricao, art_preco, art_precopromo, categoria.descricao as "categoria", art_destaque, art_promo from artigos left join categoria on categoria.id = art_categoria order by art_nome');

                        $check_d = "";
                        $check_p = "";

                        while ($array = mysqli_fetch_array($query))
                        {
                            if ($array["art_promo"]) $check_p = "checked";
                            else $check_p = "";

                            if ($array["art_destaque"]) $check_d = "checked";
                            else $check_d = "";

                            echo '
                                <tr>
                                    <td style="vertical-align: middle">'.$array["art_nome"].'</td>
                                    <td style="vertical-align: middle">'.$array["art_descricao"].'</td>
                                    <td style="vertical-align: middle">'.$array["art_preco"].'€</td>
                                    <td style="vertical-align: middle">'.$array["art_precopromo"].'€</td>
                                    <td style="vertical-align: middle">'.$array["categoria"].'</td>
                                    <td style="vertical-align: middle"><label><input type="checkbox" name="destaque" value="" disabled '.$check_d.'></label>
                                    <td style="vertical-align: middle"><label><input type="checkbox" name="promo" value="" disabled '.$check_p.'></label>
                                    
                                    <td style="padding-bottom: 3px">
                                        <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="gotoEditP('.$array["art_id"].')">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        </p>
                                    </td>
                                    
                                    <td style="padding-bottom: 3px">
                                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" name="del" onclick="delP('.$array["art_id"].')">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </p>
                                    </td>
                                </tr> 
                            ';
                        }
                        include '/opt/lampp/htdocs/Clone/connections/deconn.php';
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function delP(id) {location.href = "db.php?opc=delP&id="+id;}
    function gotoAddP() {location.href="homepage.php#addProduto"}
    function gotoEditP(id) {location.href="homepage.php?id="+id+"#editProduto"}
</script>

