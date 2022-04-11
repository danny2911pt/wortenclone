<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            include '../Clone/connections/conn.php';
            $query = mysqli_query($conn,'select count(categoria.id) from categoria');
            $array = mysqli_fetch_array($query);

            if ($array[0] == 1) echo '<h3>Lista de Categorias ('.$array[0].' Categoria)</h3>';
            else echo '<h3>Lista de Categorias ('.$array[0].' Categorias)</h3>';

            include '../Clone/connections/deconn.php';
            ?>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-hover">
                    <thead style="background-color:#a12431; color: white">
                        <th>Categoria</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>

                    <tbody>
                        <?php
                        include '/opt/lampp/htdocs/Clone/connections/conn.php';
                        $query = mysqli_query($conn,'select id, descricao from categoria order by descricao');

                        while ($array = mysqli_fetch_array($query))
                        {
                            echo '
                                <tr>
                            ';

                            if(@$_GET["id"] == $array["id"] )
                            {
                                echo '
                                    <td style="vertical-align: middle;"><input type="text" size="40" id="editCat"></td>
                                    <td style="padding-bottom: 3px">
                                        <p data-placement="top" data-toggle="tooltip" title="Edit">
                                            <button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" onclick="alterarC('.$array["id"].')">
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </button>
                                        </p>
                                    </td>
                                ';
                            }
                            else
                            {
                                echo '
                                     <td style="vertical-align: middle">'.$array["descricao"].'</td>
                                     <td style="padding-bottom: 3px">
                                        <p data-placement="top" data-toggle="tooltip" title="Edit">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" onclick="editC('.$array["id"].')">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                        </p>
                                     </td>
                                ';
                            }

                            echo '
                                <td style="padding-bottom: 3px">
                                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="delC('.$array["id"].')">
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
    function delC(data) {location.href = "db.php?opc=delC&id="+data;}
    function editC(id) {location.href = "?id="+id+"#categorias"}
    function alterarC(id)
    {
        var desc = document.getElementById("editCat").value;
        location.href = "db.php?opc=editC&id="+id+"&desc="+desc;
    }
</script>
