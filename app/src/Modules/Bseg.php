<?php
//
namespace App\Modules;
//
use App\Primitives\BigQueryConnection as Connection;
//
class Pac extends Connection{
    
  public static function instanciate($bigquery){

    if (!self::$instance instanceof self){

      self::$instance = new self($bigquery);

    }

      return self::$instance;

    }

  public function index(){
    

    $index=$this->$bigquery->query("");

    return $index;

  }

  public function date(){

    $date=$this->bigquery->query("");

    return $date;

  }

  public function month(){

    $month=$this->bigquery->query("");

    return $month;

  }

}
?>