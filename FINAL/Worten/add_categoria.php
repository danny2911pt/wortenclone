<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">

                <h3>Adicionar Categoria</h3>

                <table id="mytable" class="table table-bordered table-hover ">
                    <thead style="background-color:#a12431; color: white">
                        <th>Categoria</th>
                        <th>Adicionar</th>
                    </thead>

                    <tbody>
                        <?php
                        include '/opt/lampp/htdocs/Clone/connections/conn.php';
                            $var = "descricao";
                            echo '
                                <tr>
                                    <td style="padding-bottom: 3px"><input type="text" id="descricao" size="50"></td>
                                        
                                    <td style="padding-bottom: 3px">
                                        <p data-placement="top" data-toggle="tooltip" title="Edit">
                                            <button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="addC()">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </p>
                                    </td> 
                                </tr> 
                            ';
                        include '/opt/lampp/htdocs/Clone/connections/deconn.php';
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function addC()
    {
        var x = document.getElementById("descricao").value;
        location.href = "db.php?opc=addC&descricao="+x;
    }
</script>

