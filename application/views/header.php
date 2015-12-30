<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>" media="screen" title="no title" charset="utf-8">

        <title>Teste Service IT</title>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url();?>">Controle de Estoque</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo site_url('/clientes');?>">Clientes</a></li>
                        <li><a href="<?php echo site_url('/produtos');?>">Produtos</a></li>
                        <li><a href="<?php echo site_url('/pedidos');?>">Pedidos</a></li>
<!--                        <li><a href="<?php echo site_url('/cadastro');?>">Cadastro</a></li>-->
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>