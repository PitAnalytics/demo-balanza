<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface as Container;

class BsegController extends Controller{
    
    public function __construct(Container $container){

        //container instance by dependency injection
        $this->container=$container;

        //config by default
        $this->config=$this->container['config'];
        $this->bigquery=$this->container['bigquery']($this->config->google('bigquery'));
        $this->modules['bseg']=$this->container['bseg']($this->bigquery);

    }

    public function index($request,$response,$args){

        $index=$this->modules['bseg']->index();

        $response1 = $response->withJson($index,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        return $response2;

    }

    public function fecha($request,$response,$args){

        $fecha=$this->modules['bseg']->fecha();

        $response1 = $response->withJson($fecha,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        return $response2;

    }

    public function mes($request,$response,$args){

        $mes=$this->modules['bseg']->mes();

        $response1 = $response->withJson($mes,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        return $response2;

    }
    public function ceco(){

        $ceco=$this->modules['bseg']->ceco();

        $response1 = $response->withJson($ceco,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        return $response2;
    }
    public function cuenta(){
        
        $cuenta=$this->modules['bseg']->cuenta();

        $response1 = $response->withJson($cuenta,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        return $response2;

    }

}

?>
