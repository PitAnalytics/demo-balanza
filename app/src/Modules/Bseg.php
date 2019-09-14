<?php
//
namespace App\Modules;
//
use App\Primitives\BigQueryConnection as Connection;
//
class Pac extends Connection{
  
  private static $instance;

  public static function instanciate($bigquery){

    if (!self::$instance instanceof self){

      self::$instance = new self($bigquery);

    }

      return self::$instance;

    }

  public function index(){
    

    $index=$this->bigquery->query("SELECT * FROM `pit-analytics-2019.MULTIVA.bsegaio` LIMIT 1000");

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