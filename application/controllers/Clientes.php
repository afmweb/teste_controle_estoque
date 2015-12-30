<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
          $ACAO = filter_input(INPUT_POST, 'ACAO', FILTER_SANITIZE_STRING);
          
        if( $ACAO != 'READ'):
            
        $arrClientes = $this->Mymodel->appGetAll('cliente');
        else:
             $busca = filter_input(INPUT_POST, 'buscaCliente', FILTER_SANITIZE_STRING); 
            $arrClientes = $this->Mymodel->appLike( 'cliente', 'nome', $busca);
        endif;
        $this->load->view('header');
        $this->load->view('cliente', ['clientes' => $arrClientes]);
        $this->load->view('footer');

      

        if ($ACAO == 'INSERT'):
            $this->addCliente();
        elseif( $ACAO == 'UP'):
        $this->upCliente();
        endif;
    }
    
    private function upCliente(){
                
        
        $idCliente = filter_input(INPUT_POST, 'idCliente', FILTER_SANITIZE_NUMBER_INT);
        $nomeCliente = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $emailCliente = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $telefoneCliente = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
        
        
        $dadosCliente = [
            'nome' => $nomeCliente,
            'email' => $emailCliente,
            'telefone' => $telefoneCliente
        ];

        $upCliente = $this->Mymodel->appUpdate('cliente', $dadosCliente, ['id'=>$idCliente]);

        if ($upCliente):
            redirect(site_url('clientes'));
        endif;
        
    }
    
    public function frmdelete(){
         $idCliente =  (int) $this->uri->segment(3); 
         
         $delCliente = $this->Mymodel->appDelete( 'cliente', ['id'=> $idCliente]);
         
         if( $delCliente  ):
                       redirect(site_url('clientes'));

         endif;
    }

    private function addCliente() {

        $nomeCliente = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $emailCliente = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $telefoneCliente = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);

        $dadosCliente = [
            'nome' => $nomeCliente,
            'email' => $emailCliente,
            'telefone' => $telefoneCliente
        ];

        $novoCliente = $this->Mymodel->appInsert('cliente', $dadosCliente);

        if ($novoCliente):
            redirect(site_url('clientes'));
        endif;
    }

    public function frmupdate() {
        $idCliente = $this->uri->segment(3);
        $cliente = $this->Mymodel->appGetRow('cliente', ['id'=>$idCliente]);
        
        $this->load->view('header');
        $this->load->view('frmCliente', ['cliente' => $cliente]);
        $this->load->view('footer');
    }

}
