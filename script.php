<?php
include('DataRequest.php');

$data = new DataRequest();

if($_GET['param'] == 'clientes'){
    print_r(json_encode($data->DadosClientes()));
}

if($_GET['param'] == 'usuario'){
    print_r(json_encode($data->DadosUsuarios()));
}

if($_GET['param'] == 'fornecedores'){
    print_r(json_encode($data->DadosFornecedores()));
}
?>