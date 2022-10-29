<?php
require './vendor/autoload.php';
/* use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
 
 
$app = new \Slim\App;
$app->get('/postagens/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    
    return $response;
}); */

$app = new \Slim\App;

$app->get('/postagens2', function($request, $response){
    $id = $request->getAttribute('id');
    echo "Listagem de postagens".$id;
});

$app->get('/usuarios/[{id}]', function($request, $response){
    //atributo opcional [/{x}]
    $id = $request->getAttribute('id');
    echo "Listagem de usuarios: ".$id;
});

$app->get('/postagens[/{ano}[/{mes}]]', function($request, $response){
    $ano = $request->getAttribute('ano');
    $mes = $request->getAttribute('mes');
    echo "Ano: ".$ano. "<br> Mês: ".$mes;
});

$app->get('/lista/{itens:.*}', function($request, $response){
    
    $itens = $request->getAttribute('itens');
    
    // echo $itens;
    echo '<pre>';
    var_dump(explode("/", $itens)); //vai pegar o array itens e vai separar ele usando de separador o "/"
    echo '</pre>';
});

$app->get('/blog/postagens/{id}', function($request, $response){
    echo "Listar postagens para um ID: ";
})->setName("blog");

$app->get('/meusite', function($request, $response){
    $retorno = $this->get("router")->pathFor("blog", ["id" => "10"] );
    echo $retorno;
});


/* Agrupar Rotas */

$app->group('/v5', function(){
    $this->get('/usuarios', function($request, $response){
        echo "Listagem de usuarios";
    });
    
    $this->get('/postagens', function($request, $response){
        echo "Listagem de postagens";
    });
});






 
$app->run();
