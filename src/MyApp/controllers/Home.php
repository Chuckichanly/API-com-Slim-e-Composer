<?php

namespace MyApp\controllers;

class Home {

  // protected $container;
  protected $view;

  public function __construct($view) {
    $this->view = $view;
  }

  public function index($request, $response){

    // $view = $this->container->get('View');
    // echo '<pre>';
    var_dump($this->view);
    // echo '</pre>';
    return $response->write('Teste index');
  }

}

?>