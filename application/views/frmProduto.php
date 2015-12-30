<div class="container">
    <div class="row magin-topo80">
        <div class="col-xs-12">
            <h3>Atualização de cadastro</h3>
            <form action="<?php echo site_url('produtos/') ?>" method="post">
                <div class="form-group">
                    <input type="hidden" name="ACAO" value="UP">
                    <input type="hidden" name="idProduto" value="<?php echo $produto->id?>">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="required" value="<?php echo $produto->nome ?>">
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control"  name="descricao" placeholder="Descrição" required="required" value="<?php echo $produto->descricao ?>">
                </div>


                <div class="form-group">
                    <label for="telefone">Quantidade</label>
                    <input type="number" class="form-control" id="telefone" name="quantidade" placeholder="Quantidade" required="required" value="<?php echo $produto->quantidade ?>" >
                </div>
                
                <div class="form-group">
                    <label for="preco">Valor</label>
                    <input type="number" step="0.01" class="form-control" id="telefone" name="preco"  required="required" value="<?php echo $produto->preco ?>" >
                </div>
                

                <div class="modal-footer">                
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>                   

            </form>
        </div>
    </div>
</div>
