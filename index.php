<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require './vendor/autoload.php';

$app = new \Slim\App;([
    'settings' => [
        'displayErrorDetails' => true
        ]
    ]);
    
// Tipos de respostas cabeçalho: texto, json, xml
    //Texto
$app->get('/header', function(Request $request, Response $response){

    $response->write('Esse é um retorno header');
    return $response->withHeader('allow', 'PUT')
    ->withAddedHeader('Content-Length',30);

});

    //JSON
$app->get('/json', function(Request $request, Response $response){

    return $response->withJson([
        "nome" => "Jamilton Damasceno",
        "endereco" => "Rua KD 23"
    ]);
    
});

    //XML
$app->get('/xml', function(Request $request, Response $response){

    $xml = file_get_contents('arquivo');
    $response->write($xml);

    return $response->withHeader('Content-Type', 'application/xml');

});
    

//Middleware

$app->add( function($request, $response, $next){

    $response->write('Inicio camada 1 +');
    // return $next($request, $response);
    $response = $next($request, $response);
    
    $response->write('+ Fim camada 1 ');
    return $response;

});

$app->add( function($request, $response, $next){

    $response->write('Inicio camada 2 +');
    // return $next($request, $response);
    $response = $next($request, $response);

    $response->write('+ Fim camada 2 ');
    return $response;

});

/* $app->add( function($request, $response, $next){

    $response->write('Inicio camada 2 +');
    return $next($request, $response);

}); */

$app->get('/usuarios', function(Request $request, Response $response){

    $response->write('Ação principal usuarios middleware');

});

$app->get('/postagens', function(Request $request, Response $response){

    $response->write('Ação principal postagens middleware');

});
    
$app->run();






    /* 
// Container dependecy injection
class Servico{
}
$servico = new Servico();
    
// Container Pimple
$container = $app->getContainer();
$container['servico'] = function() { 
    return new Servico();
};

$app->get('/servico', function(Request $request, Response $response) 
// use ($servico) 
{
    
    $servico = $this->get('servico');
    var_dump($servico);

});

// Controllers como serviço
$container = $app->getContainer();
$container['Home'] = function() { 
    return new MyApp\controllers\Home( new MyApp\View);
};
$app->get('/usuario', 'Home:index' );
 */





/* $app->get('/postagens', function(Request $request, Response $response){
    
    //Recupera post 
    $post = $request->getParsedBody();

    return $post;

}); */

/* $app->put('/usuarios/atualiza', function(Request $request, Response $response){
    
    //atauliza no bd com UPDATE 
    $post = $request->getParsedBody();
    $id = $post['id'];
    $nome = $post['nome'];
    $email = $post['email'];

    return $response->getBody()->write( "Sucesso ao atualizar: ". $id);

});

$app->delete('/usuarios/remove/{id}', function(Request $request, Response $response){
    
    $id = $request->getAttribute('id');
    //deletar do bd com DELETE
    return $response->getBody()->write( "Sucesso ao deletar: ". $id);

}); */





// use \Psr\Http\Message\ServerRequestInterface as Request;
// use \Psr\Http\Message\ResponseInterface as Response;
 
 
// $app->get('/postagens/{name}', function (Request $request, Response $response, array $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");
    
//     return $response;
// });

/* $app = new \Slim\App;

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


//  Agrupar Rotas 

$app->group('/v5', function(){
    $this->get('/usuarios', function($request, $response){
        echo "Listagem de usuarios";
    });
    
    $this->get('/postagens', function($request, $response){
        echo "Listagem de postagens";
    });
}); */






 
