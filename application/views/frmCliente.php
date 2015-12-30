<div class="container">
    <div class="row magin-topo80">
        <div class="col-xs-12">
            <h3>Atualização de cadastro</h3>
            <form action="<?php echo site_url('clientes/') ?>" method="post">
                <div class="form-group">
                    <input type="hidden" name="ACAO" value="UP">
                    <input type="hidden" name="idCliente" value="<?php echo $cliente->id?>">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="required" value="<?php echo $cliente->nome ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required" value="<?php echo $cliente->email ?>">
                </div>


                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required="required" value="<?php echo $cliente->telefone ?>" >
                </div>

                <div class="modal-footer">                
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>                   

            </form>
        </div>
    </div>
</div>
