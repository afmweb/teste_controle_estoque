<div class="container">
    <div class="row magin-topo80">
        <div class="col-xs-12">
            <h3>Fazer pedido</h3>
            <form action="<?php echo site_url('pedidos/') ?>" method="post">
                <div class="form-group">
                    <input type="hidden" name="ACAO" value="INSERT">
                  
                    <label for="nome">Clientes</label>
                    <select name="cliente" class="form-control">
                        <?php foreach( $clientes as $row ): ?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->nome ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                
                <div class="form-group">
                  
                    <label for="nome">Produto</label>
                    <select name="produto" id="produto" class="form-control">
                        <?php foreach( $produtos as $row ): ?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->nome ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                

                <div class="form-group">
                    <label for="descricao">Quantidade</label>
                    <input type="number" class="form-control"  name="quantidade" placeholder="Descrição" required="required" value="1" >
                </div>         

                 <div class="form-group">               
                    <button type="submit" class="btn btn-primary">Fazer pedido</button>
                </div>                   

            </form>
            
            <h3 class="magin-topo40">Listagem de pedidos</h3>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                </tr>
                <?php foreach ( $pedidos as $row ): ?>
                <tr>
                    <td><?php echo $row->nome ?></td>
                    <td><?php echo $row->produto ?></td>
                    <td><?php echo $row->quantidade ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>


