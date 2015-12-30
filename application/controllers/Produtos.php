<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

    public function index() {
          $ACAO = filter_input(INPUT_POST, 'ACAO', FILTER_SANITIZE_STRING);
          
        if( $ACAO != 'READ'):
            
        $arrProdutos = $this->Mymodel->appGetAll('produto');
        else:
             $busca = filter_input(INPUT_POST, 'buscaProduto', FILTER_SANITIZE_STRING); 
            $arrProdutos = $this->Mymodel->appLike( 'produto', 'nome', $busca);
        endif;
        $this->load->view('header');
        $this->load->view('produtos', ['produtos' => $arrProdutos]);
        $this->load->view('footer');

      

        if ($ACAO == 'INSERT'):
            $this->addProduto();
        elseif( $ACAO == 'UP'):
        $this->upProduto();
        endif;
    }
    
    private function upProduto(){
                
        
        $idProduto = filter_input(INPUT_POST, 'idProduto', FILTER_SANITIZE_NUMBER_INT);
        $nomeProduto = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $descricaoProduto = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $quantidadeProduto = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);
        $precoProduto = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
        
        
        $dadosProduto = [
            'nome' => $nomeProduto,
            'descricao' => $descricaoProduto,
            'quantidade' => $quantidadeProduto,
            'preco' => $precoProduto,
        ];

        $upProduto = $this->Mymodel->appUpdate('produto', $dadosProduto, ['id'=>$idProduto]);

        if ($upProduto):
            redirect(site_url('produtos'));
        endif;
        
    }
    
    public function frmdelete(){
         $idProduto =  (int) $this->uri->segment(3); 
         
         $delProduto = $this->Mymodel->appDelete( 'produto', ['id'=> $idProduto]);
         
         if( $delProduto  ):
                       redirect(site_url('produtos'));

         endif;
    }

    private function addProduto() {

        $nomeProduto = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $descricaoProduto = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $precoProduto = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
        $quantidadeProduto = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);

        $dadosProduto = [
            'nome' => $nomeProduto,
            'descricao' => $descricaoProduto,
            'preco' => $precoProduto,
            'quantidade' => $quantidadeProduto,
        ];

        $novoProduto = $this->Mymodel->appInsert('produto', $dadosProduto);

        if ($novoProduto):
            redirect(site_url('produtos'));
        endif;
    }

    public function frmupdate() {
        $idProduto = $this->uri->segment(3);
        $produto = $this->Mymodel->appGetRow('produto', ['id'=>$idProduto]);
        
        $this->load->view('header');
        $this->load->view('frmProduto', ['produto' => $produto]);
        $this->load->view('footer');
    }

}
