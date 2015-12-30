<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
             $ACAO = filter_input(INPUT_POST, 'ACAO', FILTER_SANITIZE_STRING);
             
             if( $ACAO == 'INSERT' ):
                 
             $produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING);    
             $cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);    
             $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);    
                 
             $arrPedido = ['id_produto'=> $produto, 'id_cliente' =>$cliente , 'quantidade'=>$quantidade];
             
             $addPedido = $this->Mymodel->appInsert('pedido', $arrPedido);
             endif;
            
            $arrProdutos = $this->Mymodel->appGetAll('produto');
            $arrClientes = $this->Mymodel->appGetAll('cliente');
            $arrPedidos = $this->Mymodel->appGetPedidos();
            
           // $arr = $this->Mymodel->appGetAll('produto');
		$this->load->view('header');
		$this->load->view('frmPedido', ['produtos'=>$arrProdutos, 'clientes'=>$arrClientes, 'pedidos'=>$arrPedidos]);
		$this->load->view('footer');
	}
}
