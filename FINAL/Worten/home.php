<div class="row" style="width: 100%">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <table class="table table-bordered">
            <thead style="background:#a12431;color:white;">
                <h3 style="text-align:center;">Rank Produtos (Views)</h3>

                <tr>
                    <th>#</th>
                    <th>Produto</th>
                    <th>Nº Visualizações</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    include "functions.php";
                    rankviews()
                ?>
            </tbody>
        </table>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <table class="table table-bordered">
   
            <thead style="background:#a12431; color:white;">
                <h3 style="text-align:center;">Rank Produtos (Vendas)</h3>

                <tr>
                    <th>#</th>
                    <th>Produto</th>
                    <th>Nº Vendas</th>
                </tr>
            </thead>
            <tbody >
            <?php
                include "connections/conn.php";
                $query = mysqli_query($conn, "select art_vendas, art_nome from artigos order by art_vendas desc");

                $i = 1;
                while($array = mysqli_fetch_array($query))
                {
                    echo'
                        <tr>
                            <td>'.$i.'</td>
                            <td>'.$array["art_nome"].'</td>
                            <td>'.$array["art_vendas"].'</td>
                        </tr>
                    ';
                    $i++;
                }
                include "connections/deconn.php";
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




