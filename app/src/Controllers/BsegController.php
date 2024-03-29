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
    public function ceco($request,$response,$args){

        $ceco=$this->modules['bseg']->ceco();

        $response1 = $response->withJson($ceco,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        return $response2;
    }
    public function cuenta($request,$response,$args){
        
        $cuenta=$this->modules['bseg']->cuenta();

        $response1 = $response->withJson($cuenta,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        return $response2;

    }
    
    public function sociedad($request,$response,$args){
        
        $sociedad=$this->modules['bseg']->sociedad();

        $response1 = $response->withJson($sociedad,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        return $response2;

    }

    public function superConcepto($request,$response,$args){
        
        $superConcepto=$this->modules['bseg']->superConcepto();

        $response1 = $response->withJson($superConcepto,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        return $response2;

    }

    public function concepto($request,$response,$args){
        
        $superConcepto=$this->modules['bseg']->concepto();

        $response1 = $response->withJson($superConcepto,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        return $response2;

    }

}

?>
