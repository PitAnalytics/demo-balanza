<?php
//
namespace App\Modules;
//
use App\Primitives\BigQueryConnection as Connection;
//
class Bseg extends Connection{
  
  private static $instance;

  public static function instanciate($bigquery){

    if (!self::$instance instanceof self){

      self::$instance = new self($bigquery);

    }

      return self::$instance;

    }

  public function index(){
    

    $index=$this->bigquery->query(
      "SELECT CONCAT(SUBSTR(BUDAT,0,4),'-',SUBSTR(BUDAT,5,2),'-',SUBSTR(BUDAT,7,2)) AS fecha, DMBTR AS monto, HKONT, SGTXT as texto AS cuenta FROM `pit-analytics-2019.MULTIVA.bsegaio`    ");

    return $index;

  }

  public function date(){

    $date=$this->bigquery->query(
      "SELECT CONCAT(SUBSTR(BUDAT,0,4),'-',SUBSTR(BUDAT,5,2),'-',SUBSTR(BUDAT,7,2)) AS fecha"
    );

    return $date;

  }

  public function month(){

    $month=$this->bigquery->query("");

    return $month;

  }

}
?>