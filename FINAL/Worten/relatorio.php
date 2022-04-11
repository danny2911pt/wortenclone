<div class="container">
	<div class="row">
        <div class="col-md-12">
            <?php
                include "connections/conn.php";
                @$total = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(tb_cartitens.preco*tb_cartitens.qta) from tb_cartitens join tb_cart on tb_cartitens.cart_id = tb_cart.cart_id where pendente = 2"));
                include "connections/deconn.php";

                echo '<h3 style="text-align:center;">Volume de vendas ('.$total[0].'€)</h3>';
            ?>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-hover ">
                    <thead style="background-color:#a12431; color: white">
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Nif</th>
                        <th>Despesa Total</th>
                    </thead>

                    <tbody>
                        <?php
                            include "connections/conn.php";
                            $query = mysqli_query($conn, "select u_nome, u_nif, id_login from utilizadores");

                            $ct = 1;
                            while ($array1 = mysqli_fetch_array($query))
                            {
                                $query2 = mysqli_query($conn, "SELECT SUM(tb_cartitens.preco*tb_cartitens.qta) as 'soma' 
                                                                 from tb_cartitens join tb_cart on tb_cart.cart_id = tb_cartitens.cart_id
				                                                                   join utilizadores on utilizadores.id_login = tb_cart.id_login
                                                                                   join login on login.id_login = utilizadores.id_login
                                                                 where utilizadores.id_login = $array1[id_login] and pendente = 2");
                                $array2 = mysqli_fetch_array($query2);
                                echo '
                                    <tr>
                                        <td style="vertical-align: middle">'.$ct.'</td>
                                        <td style="vertical-align: middle">'.$array1["u_nome"].'</td>
                                        <td style="vertical-align: middle">'.$array1["u_nif"].'</td>
                                        <td style="vertical-align: middle">'.$array2["soma"].'€</td>
                                    </tr>
                                ';
                                $ct++;
                            }
                            include "connections/deconn.php";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
