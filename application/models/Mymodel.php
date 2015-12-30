<?php

class Mymodel extends CI_Model {

    //Retorna todos os dados de uma tabela
    public function appGetAll( $tabela ) {

        return $this->db->get( $tabela )->result();
    }

    //Retorna 1 registro de uma tabela
    public function appGetRow( $tabela, array $dadosWhere ) {

        return $this->db->get_where( $tabela, $dadosWhere )->row();
    }

    //Retorna array de dados se condição/where for atendida
    public function appWhere( $tabela, array $condicoees ) {

        return $this->db->get_where( $tabela, $condicoees )->result();
    }


    //Faz um Join com 
    private function joinProdutoCategoria() {
        $this->db->select( 'p.*, (select nome from lj_categorias where id = p.categoria_id limit 1) as nomeCateg, p.quantidade, p.dt_cadastro' );
        return $this->db->from( 'lj_produtos as p' );
    }

  
      public function appSession(  $nome ){
          if( empty($nome) ):
          $usuario = $this->session->userdata('usuarioLogado');
          return $usuario->$nome;
          else:
              return false;
          endif;
      }


    //Consulta com like
    public function appLike( $table, $campo, $valor ) {
        $this->db->like($campo, $valor);
        $busca = $this->db->get($table);
        return $busca->result();
    }

    //Cadastra dados em uma tabela
    public function appInsert( $tabela, array $usuario ) {

        return $this->db->insert( $tabela, $usuario );
    }

    //Atualiza dados de uma tabela
    public function appUpdate( $tabela, array $camposValores, array $camposCondicao ) {

        return $this->db->update( $tabela, $camposValores, $camposCondicao );
    }
    
    
    //Atualiza dados de uma tabela
    public function appDelete( $tabela,  array $camposCondicao ) {

        return $this->db->delete( $tabela,  $camposCondicao );
    }
    
    

    //Veririca se usuario existe dentro de uma tabela
    public function appLogin( $tabela, array $dadosUser ) {

        $this->db->where( $dadosUser );
        return $this->db->get( $tabela )->row();
    }

    //Destroi uma sessão
    public function appLogout( $sessao ) {

        if ( $sessao ):

            $this->session->unset_userdata( $sessao );

            return true;

        endif;
    }

    //Restringe acesso a uma sessão existente
    public function appAutoriza( $nomeSessao, $redirect = '/' ) {

        $sessao = $this->session->userdata( $nomeSessao );

        if ( !$sessao ):

            return redirect( $redirect );

        endif;
    }

    
        public function appGetPedidos(  ) {

        $this->db->select( 'p.*, c.nome, prod.nome as produto  ' );
        $this->db->from( 'pedido as p' );
        $this->db->join( 'cliente as c', 'c.id = p.id_cliente' );
        $this->db->join( 'produto as prod', 'prod.id = p.id_produto' );

        return $this->db->get()->result();
    }
    
    
//***************************************************************/*
//  quetys que não são genéricas
//***************************************************************/*        
    //Busca venda do vendedor logado no sistema
    public function buscaVendidos( $idVendedor ) {

        $this->output->enable_profiler( TRUE );

        $this->db->select( 'p.*, v.data_de_entrega' );
        $this->db->from( 'alura_produtos as p' );
        $this->db->join( 'alura_vendas as v', 'v.produto_id = p.id' );
        $this->db->where( 'vendido', true );
        $this->db->where( 'usuario_id', $idVendedor );

        return $this->db->get()->result();
    }

    //Array para montar combobox Catetorias

    public function comboCategoria() {

        $this->db->select( 'id, nome' );
        $this->db->from( 'lj_categorias' );
        $this->db->order_by( 'nome' );
        $query = $this->db->get();
        return $query->result();
    }

    //Retorna nome de categoria

    public function appGetNomeCategoria( $id ) {

        $this->db->where( array( 'id' => $id ) );
        $nome = $this->db->get( 'lj_categorias' )->row;

        return $nome->nome;
    }

    //Pesquisa Produto
    //Consulta com like
    public function appPesquisaProduto( $produto, $categoria ) {
        $this->joinProdutoCategoria();
        if ( !empty( $categoria ) ):
            $this->db->where( array( 'categoria_id' => $categoria ) );
        endif;
        $this->db->like( 'nome', $produto );
        $this->db->order_by('nome');
        return $this->db->get()->result();
    }
    
    
//RETORNA PRODDUTOS EM DESTAQUE
public function appProdutosEmDestaque($condicao) {
   
    $this->joinProdutoCategoria();
    $this->db->where(array('destaque'=>$condicao));
    return $this->db->get()->result();
}    


//Metodo de gravar log

    public function appLogs($tabela, $nome, $informacoes) {
        $ip = $_SERVER['REMOTE_ADDR'];
        
        $dados = [
            'ip'   => $ip,
            'acao' => $nome,
            'informacao' => $informacoes
        ];
        
        $this->db->insert( $tabela, $dados );
        
    }
    
    public function appOrderLimit( $table,$order, $limit, $DESC = 'ASC') {
        $this->db->order_by($order, $DESC);
        $this->db->limit($limit);
        return $this->db->get($table)->result();
    
}
    
    /**
    * DESCRICAO: Metodo que conta total de registro existente no banco
    */
    function somarTodos()
    {
		return $this->db->count_all('lj_produtos');    
    }

    /**
     *  DESCRICAO: Metodo que busca todos os dados do produto
     */
    function buscarTodos( $_limit = 100, $_start = 0 )
    { 
    	$this->db->limit( $_limit, $_start ); 
        return $this->db->get('lj_produtos')->result();
    }  


}



