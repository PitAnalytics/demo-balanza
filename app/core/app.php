<?php
//
/************************/
/*****PSR-7-INTERFACE****/
/************************/
//
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
//
/**********************/
/***SLIM-INSTANCE******/
/**********************/
//
$app = new \Slim\App(['settings' => ['displayErrorDetails' => true,'responseChunkSize' => 10096]]);
//
/*********************/
/******CONTAINER******/
/*********************/
//
require_once '../app/core/container.php';
//
/*********************/
/*******ROUTER********/
/*********************/
//
$app->get('/', \App\Controllers\TestController::class.':wellcome');
$app->get('/api/bseg', \App\Controllers\BsegController::class.':index');
$app->get('/api/bseg/fecha', \App\Controllers\BsegController::class.':fecha');
$app->get('/api/bseg/cuenta', \App\Controllers\BsegController::class.':cuenta');
$app->get('/api/bseg/sociedad', \App\Controllers\BsegController::class.':sociedad');
$app->get('/api/bseg/ceco', \App\Controllers\BsegController::class.':ceco');
$app->get('/api/bseg/mes', \App\Controllers\BsegController::class.':mes');
//
/******************/
/****EJECUTAMOS****/
/******************/
//
$app->run();

?>
