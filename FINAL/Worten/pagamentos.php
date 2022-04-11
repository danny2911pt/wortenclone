<div class="container">
	<div class="row">
        <div class="col-md-12">

            <h3 style="text-align:center;">Pagamentos Pendentes</h3>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-hover ">
                    <thead style="background-color:#a12431; color: white;">
                        <th>Cliente</th>
                        <th>Nif</th>
                        <th>Valor da Compra</th>
                        <th>Aceitar</th>
                        <th>Recusar</th>
                   </thead>
                       <tbody>
                           <?php
                               include "connections/conn.php";
                               $query = mysqli_query($conn, "select utilizadores.u_nome, sum(tb_cartitens.preco*tb_cartitens.qta) as 'valor', tb_cart.id, utilizadores.u_nif
                                                          from tb_cartitens join tb_cart on tb_cart.cart_id = tb_cartitens.cart_id
                                                          join utilizadores on utilizadores.id_utilizador = tb_cart.id_login
                                                          where pendente = 1
                                                          group by tb_cart.id, u_nome");
                               include "connections/deconn.php";

                               while($array = mysqli_fetch_array($query))
                               {
                                   echo '
                                        <tr>
                                            <td style="vertical-align: middle">'.$array["u_nome"].'</td>
                                            <td style="vertical-align: middle">'.$array["u_nif"].'</td>
                                            <td style="vertical-align: middle">'.$array["valor"].'€</td>
                                            <td style="padding-bottom: 3px">
                                                <p data-placement="top" data-toggle="tooltip" title="Confirm">
                                                    <button class="btn btn-success btn-xs" data-title="Confirmar" data-toggle="modal" data-target="#confirm" onclick="accept('.$array["id"].')">
                                                        <span class="glyphicon glyphicon-ok"></span>
                                                    </button>
                                                </p>
                                            </td>
                                        
                                            <td style="padding-bottom: 3px">
                                                <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                    <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="deny('.$array["id"].')">
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                    </button>
                                                </p>
                                            </td>
                                        </tr> 
                                   ';
                               }
                           ?>
                       </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="row">
         <div class="col-md-12">

            <h3 style="text-align:center;">Pagamentos Processados</h3>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-hover ">
                    <thead style="background:#a12431; color: white">
                        <th>Cliente</th>
                        <th>Nif</th>
                        <th>Valor da Compra</th>
                        <th>Estado</th>  
                   </thead>
                       <tbody>
                           <?php
                           include "connections/conn.php";
                           $query = mysqli_query($conn, "select utilizadores.u_nome, (tb_cartitens.preco*tb_cartitens.qta) as 'valor', tb_cart.id, pendente, utilizadores.u_nif
                                                              from tb_cartitens join tb_cart on tb_cart.cart_id = tb_cartitens.cart_id
                                                              join utilizadores on utilizadores.id_utilizador = tb_cart.id_login
                                                              where pendente != 1
                                                              group by tb_cart.id");
                           include "connections/deconn.php";

                           while($array = mysqli_fetch_array($query))
                           {
                               echo '
                                    <tr>
                                        <td style="vertical-align: middle">'.$array["u_nome"].'</td>
                                        <td style="vertical-align: middle">'.$array["u_nif"].'</td>
                                        <td style="vertical-align: middle">'.$array["valor"].'€</td>
                               ';

                               if ($array["pendente"] == 2)
                               {
                                    echo '
                                        <td style="padding-bottom: 3px">
                                                <p data-placement="top" data-toggle="tooltip" title="Confirm">
                                                    <button class="btn btn-success btn-xs" data-title="Confirmar" data-toggle="modal" data-target="#confirm")">
                                                        <span class="glyphicon glyphicon-ok"></span>
                                                    </button>
                                                </p>
                                            </td>
                                        </tr>    
                                    ';
                               }
                                else
                                {
                                    echo '
                                        <td style="padding-bottom: 3px">
                                            <p data-placement="top" data-toggle="tooltip" title="Confirm">
                                                <button class="btn btn-danger btn-xs" data-title="Confirmar" data-toggle="modal" data-target="#confirm">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </button>
                                            </p>
                                        </td>
                                    </tr>    
                                    ';
                                }
                           }
                           ?>
                       </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function accept(data) {location.href = "db.php?opc=accept&id="+data;}
    function deny(data) {location.href = "db.php?opc=deny&id="+data}
</script>