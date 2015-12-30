<div class="container">
    <div class="row  magin-topo80">
        <div class="col-xs-12">

            <form name="jq-Busca" method="post" action="">
                <div class="input-group">
                    <input type="hidden" name="ACAO" value="READ">
                    <input type="text" name="buscaCliente" required="" id="nomeFuncionario" placeholder="Localizar Cliente" class="form-control" />
                    <div class="input-group-addon btnform bg-info">
                        <button type="submit"  style="background: none; border: none;" ><span class="glyphicon glyphicon-search btnform"></span></button>
                    </div>
                </div>
            </form>
            <table class="table table-responsive table-bordered table-hover magin-topo40">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <td colspan="2"><button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalAddCliente">Novo</button> </td>
                </tr>
                <?php foreach ($clientes as $row): ?>
                    <tr>
                        <td><?php echo $row->nome ?></td>
                        <td><?php echo $row->email ?></td>
                        <td><?php echo $row->telefone ?></td>
                        <td style="width: 20px"><a href="<?php echo site_url("/clientes/frmupdate/{$row->id}") ?>"  rel="http://afmweb.com.br/demos/"   class="btn btn-warning jq-edit"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td style="width: 20px"><a href="<?php echo site_url("/clientes/frmdelete/{$row->id}") ?>" class="btn btn-danger" 
                                                   onclick="if (confirm('Tem certeza de que deseja excluir o este registro ?')) { document.post_6.submit(); } event.returnValue = false; return false;" ><span class="glyphicon glyphicon-remove"></span></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalAddCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadastro de Cliente</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="hidden" name="ACAO" value="INSERT">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="required">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
                    </div>


                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required="required">
                    </div>

                    <div class="modal-footer">                
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>                   

                </form>
            </div>

        </div>
    </div>
</div>
